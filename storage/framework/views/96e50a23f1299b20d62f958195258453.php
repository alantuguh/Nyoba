<!DOCTYPE html>
<html lang="id"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_blank" name="shell-type"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"on-surface":"#0b1c30","on-primary":"#ffffff","tertiary-fixed-dim":"#4edea3","primary-fixed":"#9cf2e8","on-tertiary-fixed-variant":"#005236","secondary-fixed-dim":"#ffb95f","surface-tint":"#006a63","on-primary-fixed":"#00201d","surface-dim":"#cbdbf5","inverse-primary":"#80d5cb","secondary-container":"#fea619","inverse-on-surface":"#eaf1ff","surface-container-lowest":"#ffffff","on-error-container":"#93000a","on-surface-variant":"#3e4947","surface-bright":"#f8f9ff","primary":"#005c55","primary-container":"#0f766e","on-tertiary":"#ffffff","surface-container-high":"#dce9ff","surface-container":"#e5eeff","outline":"#6e7977","on-primary-container":"#a3faef","secondary-fixed":"#ffddb8","on-error":"#ffffff","on-tertiary-container":"#99ffcd","surface-container-low":"#eff4ff","surface":"#f8f9ff","background":"#f8f9ff","tertiary":"#005e3f","secondary":"#855300","primary-fixed-dim":"#80d5cb","outline-variant":"#bdc9c6","tertiary-container":"#007952","inverse-surface":"#213145","on-secondary":"#ffffff","on-tertiary-fixed":"#002113","error":"#ba1a1a","surface-variant":"#d3e4fe","on-background":"#0b1c30","surface-container-highest":"#d3e4fe","on-primary-fixed-variant":"#00504a","tertiary-fixed":"#6ffbbe","on-secondary-fixed":"#2a1700","error-container":"#ffdad6","on-secondary-container":"#684000","on-secondary-fixed-variant":"#653e00"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-sm":"0.5rem","space-lg":"1.5rem","margin-mobile":"1rem","gutter":"1.5rem","space-xs":"0.25rem","space-xl":"2rem","margin":"2rem","space-2xl":"3rem","gutter-mobile":"1rem","space-md":"1rem"},"fontFamily":{"body-sm":["Inter"],"headline-md":["Inter"],"headline-lg-mobile":["Inter"],"body-md":["Inter"],"display":["Inter"],"label-md":["Inter"],"body-lg":["Inter"],"label-sm":["Inter"],"headline-sm":["Inter"],"headline-lg":["Inter"],"label-lg":["Inter"],"mono-numeric":["Inter"]},"fontSize":{"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-md":["22px",{"lineHeight":"28px","letterSpacing":"-0.015em","fontWeight":"600"}],"headline-lg-mobile":["24px",{"lineHeight":"32px","letterSpacing":"-0.02em","fontWeight":"700"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"display":["36px",{"lineHeight":"44px","letterSpacing":"-0.025em","fontWeight":"700"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.01em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","letterSpacing":"-0.005em","fontWeight":"400"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.02em","fontWeight":"600"}],"headline-sm":["18px",{"lineHeight":"24px","letterSpacing":"-0.01em","fontWeight":"600"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.02em","fontWeight":"700"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0em","fontWeight":"600"}],"mono-numeric":["14px",{"lineHeight":"20px","letterSpacing":"-0.01em","fontWeight":"600"}]}}}}</script><title>Daftar Akun — KosAudit</title></head>
<body class="bg-background font-body-md text-on-surface antialiased">
<main class="min-h-screen w-full flex items-center justify-center p-space-lg bg-surface">
<div class="w-full max-w-md">
  <a href="/" class="inline-flex items-center gap-1 mb-4 font-label-md text-label-md text-primary hover:text-primary-container"><span class="material-symbols-outlined text-[18px]">arrow_back</span> Kembali ke beranda</a>
  <div class="shadow-xl rounded-xl overflow-hidden bg-surface-container-lowest p-space-xl sm:p-space-2xl">
    <div class="flex items-center gap-2 mb-space-lg">
      <span class="w-9 h-9 rounded-lg bg-primary-container text-on-primary flex items-center justify-center"><span class="material-symbols-outlined text-[22px]">domain_verification</span></span>
      <span class="font-headline-sm text-headline-sm text-primary">KosAudit</span>
    </div>
    <h1 class="font-headline-md text-headline-md">Buat Akun Baru</h1>
    <p class="mt-1 mb-space-lg font-body-md text-body-md text-on-surface-variant">Pilih peran Anda, lalu isi data diri.</p>

    <form id="registerForm" class="space-y-space-md" novalidate>
      <div id="formError" class="hidden rounded-lg bg-error-container text-on-error-container font-body-sm text-body-sm px-3 py-2" role="alert"></div>
      <fieldset class="flex flex-col gap-space-xs">
<legend class="font-label-md text-label-md text-on-surface mb-1">Daftar sebagai</legend>
<div class="grid grid-cols-2 gap-space-sm">
<label class="cursor-pointer">
<input type="radio" name="role" value="owner" class="peer sr-only" checked/>
<div class="h-full rounded-lg border-2 border-outline-variant p-3 transition-colors peer-checked:border-primary peer-checked:bg-primary-fixed/30 hover:bg-surface-container-low">
<span class="material-symbols-outlined text-primary text-[26px]">real_estate_agent</span>
<p class="mt-1 font-label-lg text-label-lg">Pemilik Kos</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Kelola kamar, inspeksi &amp; deposit</p>
</div></label>
<label class="cursor-pointer">
<input type="radio" name="role" value="tenant" class="peer sr-only" />
<div class="h-full rounded-lg border-2 border-outline-variant p-3 transition-colors peer-checked:border-primary peer-checked:bg-primary-fixed/30 hover:bg-surface-container-low">
<span class="material-symbols-outlined text-primary text-[26px]">person</span>
<p class="mt-1 font-label-lg text-label-lg">Penghuni</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Lihat kondisi kamar &amp; deposit</p>
</div></label>
</div>
<p class="hidden font-body-sm text-body-sm text-error" data-err="role"></p>
</fieldset>
      <div class="flex flex-col gap-space-xs">
<label class="font-label-md text-label-md text-on-surface" for="name">Nama Lengkap</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-outline pointer-events-none text-[20px]">person</span>
<input class="w-full pl-10 pr-3 py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest transition-colors" id="name" name="name" type="text" placeholder="Nama Anda" autocomplete="name" required />
</div>
<p class="hidden font-body-sm text-body-sm text-error" data-err="name"></p>
</div>
      <div class="flex flex-col gap-space-xs">
<label class="font-label-md text-label-md text-on-surface" for="email">Email</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-outline pointer-events-none text-[20px]">mail</span>
<input class="w-full pl-10 pr-3 py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest transition-colors" id="email" name="email" type="email" placeholder="nama@email.com" autocomplete="email" required />
</div>
<p class="hidden font-body-sm text-body-sm text-error" data-err="email"></p>
</div>
      <div class="flex flex-col gap-space-xs">
<label class="font-label-md text-label-md text-on-surface" for="phone">Nomor HP</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-outline pointer-events-none text-[20px]">call</span>
<input class="w-full pl-10 pr-3 py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest transition-colors" id="phone" name="phone" type="tel" placeholder="081234567890" autocomplete="tel" required />
</div>
<p class="hidden font-body-sm text-body-sm text-error" data-err="phone"></p>
</div>
      <div class="flex flex-col gap-space-xs">
<label class="font-label-md text-label-md text-on-surface" for="password">Kata Sandi (min. 8 karakter)</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-outline pointer-events-none text-[20px]">lock</span>
<input class="w-full pl-10 pr-3 py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest transition-colors" id="password" name="password" type="password" placeholder="••••••••" autocomplete="new-password" required />
</div>
<p class="hidden font-body-sm text-body-sm text-error" data-err="password"></p>
</div>
      <div class="flex flex-col gap-space-xs">
<label class="font-label-md text-label-md text-on-surface" for="password_confirmation">Ulangi Kata Sandi</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-outline pointer-events-none text-[20px]">lock_reset</span>
<input class="w-full pl-10 pr-3 py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest transition-colors" id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" autocomplete="new-password" required />
</div>
<p class="hidden font-body-sm text-body-sm text-error" data-err="password_confirmation"></p>
</div>
      <button id="registerBtn" type="submit" class="w-full py-3 px-space-lg rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg flex items-center justify-center gap-space-sm shadow-md transition-all active:scale-[0.99] disabled:opacity-60">
        <span id="registerLabel">Buat Akun</span><span class="material-symbols-outlined text-[20px]">arrow_forward</span>
      </button>
    </form>

    <p class="mt-space-lg text-center font-body-sm text-body-sm text-on-surface-variant">
      Sudah punya akun?
      <a class="font-label-md text-label-md text-primary hover:text-primary-container ml-1" href="/login">Masuk</a>
    </p>
  </div>
</div>
</main>
<script>
  const form = document.getElementById('registerForm');
  const formError = document.getElementById('formError');
  const btn = document.getElementById('registerBtn');
  const label = document.getElementById('registerLabel');

  function clearErrors() {
    formError.classList.add('hidden');
    document.querySelectorAll('[data-err]').forEach(el => { el.textContent = ''; el.classList.add('hidden'); });
  }
  function showFieldError(name, msg) {
    const el = document.querySelector('[data-err="' + name + '"]');
    if (el) { el.textContent = msg; el.classList.remove('hidden'); return true; }
    return false;
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    clearErrors();
    const body = {
      role: (form.querySelector('input[name=role]:checked') || {}).value,
      name: form.name.value.trim(),
      email: form.email.value.trim(),
      phone: form.phone.value.trim(),
      password: form.password.value,
      password_confirmation: form.password_confirmation.value,
      device_name: 'web'
    };
    btn.disabled = true; label.textContent = 'Memproses...';
    try {
      const res = await fetch('/api/auth/signup', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
        body: JSON.stringify(body)
      });
      const data = await res.json().catch(() => ({}));
      if (!res.ok) {
        if (res.status === 422 && data.errors) {
          const leftovers = [];
          Object.entries(data.errors).forEach(([field, msgs]) => {
            if (!showFieldError(field, msgs[0])) leftovers.push(msgs[0]);
          });
          if (leftovers.length) { formError.textContent = leftovers.join(' '); formError.classList.remove('hidden'); }
        } else {
          formError.textContent = res.status === 429
            ? 'Terlalu banyak percobaan. Coba lagi sebentar lagi.'
            : (data.message || 'Pendaftaran gagal. Coba lagi.');
          formError.classList.remove('hidden');
        }
        return;
      }
      sessionStorage.setItem('kosaudit_token', data.token);
      sessionStorage.setItem('kosaudit_user', JSON.stringify(data.user));
      window.location.href = data.user.role === 'owner' ? '/owner/dashboard' : '/tenant/dashboard';
    } catch (err) {
      formError.textContent = 'Tidak dapat terhubung ke server. Pastikan server Laravel dan MySQL berjalan.';
      formError.classList.remove('hidden');
    } finally {
      btn.disabled = false; label.textContent = 'Buat Akun';
    }
  });
  // /register?role=tenant -> pilihan awal
  const pre = new URLSearchParams(location.search).get('role');
  if (pre === 'owner' || pre === 'tenant') { const r = form.querySelector('input[name=role][value=' + pre + ']'); if (r) r.checked = true; }
</script>
</body></html>
<?php /**PATH C:\Coba\Coba\resources\views/auth/register.blade.php ENDPATH**/ ?>