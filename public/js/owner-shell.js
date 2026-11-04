/**
 * Kerangka bersama halaman Owner: pengecekan login, nama user di header,
 * jumlah kamar di sidebar, tombol keluar, dan pengganti logo yang rusak.
 * Pemakaian di halaman: <script src="/js/owner-shell.js"></script>
 * Lalu: KosShell.ready.then(({ user, summary }) => { ... })
 */
(() => {
  const TOKEN = localStorage.getItem('kosaudit_token') || sessionStorage.getItem('kosaudit_token');
  const toLogin = () => {
    localStorage.removeItem('kosaudit_token'); localStorage.removeItem('kosaudit_user');
    sessionStorage.removeItem('kosaudit_token'); sessionStorage.removeItem('kosaudit_user');
    window.location.href = '/login';
  };
  if (!TOKEN) { toLogin(); return; }

  async function api(path, opts = {}) {
    const res = await fetch('/api' + path, {
      ...opts,
      headers: { 'Accept': 'application/json', 'Content-Type': 'application/json', 'Authorization': 'Bearer ' + TOKEN, ...(opts.headers || {}) },
    });
    const data = await res.json().catch(() => ({}));
    if (res.status === 401) { toLogin(); throw new Error('unauthenticated'); }
    if (res.status === 403) { window.location.href = '/tenant/dashboard'; throw new Error('forbidden'); }
    if (!res.ok) throw new Error(data.message || 'Terjadi kesalahan.');
    return data;
  }

  function applyShell({ user, summary }) {
    // Header: nama & peran
    const box = document.querySelector('header .text-right');
    if (box) {
      const p = box.querySelectorAll('p');
      if (p[0]) p[0].textContent = user.name;
      if (p[1]) p[1].textContent = user.role_label;
    }
    // Sidebar: nama kos & jumlah kamar terisi
    document.querySelectorAll('aside p').forEach((el) => {
      const t = el.textContent.trim();
      if (t === 'Griya Asri Putri') el.textContent = 'Kos ' + user.name.split(' ')[0];
      else if (/^\d+ Kamar Terisi$/.test(t)) el.textContent = summary.rooms_by_status.terisi + ' Kamar Terisi';
    });
    // Logo gambar (link eksternal sering rusak) -> ikon
    document.querySelectorAll('img[alt="KosAudit Logo"]').forEach((img) => {
      const s = document.createElement('span');
      s.className = 'w-9 h-9 shrink-0 rounded-lg bg-primary-container text-on-primary flex items-center justify-center';
      s.innerHTML = '<span class="material-symbols-outlined text-[22px]">domain_verification</span>';
      img.replaceWith(s);
    });
    // Tombol keluar
    const row = box && box.parentElement;
    if (row && !document.getElementById('btnLogout')) {
      const b = document.createElement('button');
      b.id = 'btnLogout'; b.type = 'button'; b.title = 'Keluar';
      b.className = 'p-2 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-error transition-colors';
      b.innerHTML = '<span class="material-symbols-outlined text-[22px]">logout</span>';
      b.addEventListener('click', async () => {
        try { await api('/auth/logout', { method: 'POST' }); } catch (e) { /* tetap keluar */ }
        toLogin();
      });
      row.appendChild(b);
    }
  }

  const ready = api('/owner/dashboard').then((d) => { applyShell(d); return d; });
  ready.catch((e) => { if (!['unauthenticated', 'forbidden'].includes(e.message)) console.error('Gagal memuat ringkasan:', e); });
  window.KosShell = { token: TOKEN, api, ready };
})();
