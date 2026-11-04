<!DOCTYPE html>

<html lang="id"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_blank" name="shell-type"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"on-surface":"#0b1c30","on-primary":"#ffffff","tertiary-fixed-dim":"#4edea3","primary-fixed":"#9cf2e8","on-tertiary-fixed-variant":"#005236","secondary-fixed-dim":"#ffb95f","surface-tint":"#006a63","on-primary-fixed":"#00201d","surface-dim":"#cbdbf5","inverse-primary":"#80d5cb","secondary-container":"#fea619","inverse-on-surface":"#eaf1ff","surface-container-lowest":"#ffffff","on-error-container":"#93000a","on-surface-variant":"#3e4947","surface-bright":"#f8f9ff","primary":"#005c55","primary-container":"#0f766e","on-tertiary":"#ffffff","surface-container-high":"#dce9ff","surface-container":"#e5eeff","outline":"#6e7977","on-primary-container":"#a3faef","secondary-fixed":"#ffddb8","on-error":"#ffffff","on-tertiary-container":"#99ffcd","surface-container-low":"#eff4ff","surface":"#f8f9ff","background":"#f8f9ff","tertiary":"#005e3f","secondary":"#855300","primary-fixed-dim":"#80d5cb","outline-variant":"#bdc9c6","tertiary-container":"#007952","inverse-surface":"#213145","on-secondary":"#ffffff","on-tertiary-fixed":"#002113","error":"#ba1a1a","surface-variant":"#d3e4fe","on-background":"#0b1c30","surface-container-highest":"#d3e4fe","on-primary-fixed-variant":"#00504a","tertiary-fixed":"#6ffbbe","on-secondary-fixed":"#2a1700","error-container":"#ffdad6","on-secondary-container":"#684000","on-secondary-fixed-variant":"#653e00"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-sm":"0.5rem","space-lg":"1.5rem","margin-mobile":"1rem","gutter":"1.5rem","space-xs":"0.25rem","space-xl":"2rem","margin":"2rem","space-2xl":"3rem","gutter-mobile":"1rem","space-md":"1rem"},"fontFamily":{"body-sm":["Inter"],"headline-md":["Inter"],"headline-lg-mobile":["Inter"],"body-md":["Inter"],"display":["Inter"],"label-md":["Inter"],"body-lg":["Inter"],"label-sm":["Inter"],"headline-sm":["Inter"],"headline-lg":["Inter"],"label-lg":["Inter"],"mono-numeric":["Inter"]},"fontSize":{"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-md":["22px",{"lineHeight":"28px","letterSpacing":"-0.015em","fontWeight":"600"}],"headline-lg-mobile":["24px",{"lineHeight":"32px","letterSpacing":"-0.02em","fontWeight":"700"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"display":["36px",{"lineHeight":"44px","letterSpacing":"-0.025em","fontWeight":"700"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.01em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","letterSpacing":"-0.005em","fontWeight":"400"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.02em","fontWeight":"600"}],"headline-sm":["18px",{"lineHeight":"24px","letterSpacing":"-0.01em","fontWeight":"600"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.02em","fontWeight":"700"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0em","fontWeight":"600"}],"mono-numeric":["14px",{"lineHeight":"20px","letterSpacing":"-0.01em","fontWeight":"600"}]}}}}</script></head><body class="bg-background font-body-md text-on-surface antialiased"><main class="min-h-screen w-full flex items-center justify-center p-space-lg bg-surface"><div class="flex flex-col w-full">
<a href="/" class="inline-flex items-center gap-1 mb-4 mx-auto w-full max-w-md font-label-md text-label-md text-primary hover:text-primary-container"><span class="material-symbols-outlined text-[18px]">arrow_back</span> Kembali ke beranda</a>
<div class="w-full max-w-md mx-auto my-auto shadow-xl rounded-xl overflow-hidden bg-surface-container-lowest">
<div class="grid grid-cols-1">
<!-- Left Column: Login Card & Auth Form -->
<div class="p-space-xl sm:p-space-2xl flex flex-col justify-between bg-surface-container-lowest">
<div>
<!-- Logo & Branding -->
<div class="flex flex-col items-start gap-space-sm mb-space-xl">
<img alt="KosAudit Logo" class="h-10 w-auto object-contain" src="https://lh3.googleusercontent.com/aida/AEtjO1VccVtBci1Z4oar_s07q4sGOWaN0aLtq90O4Ocypznpyeeyhv5qUb-AUGoig7JMFgZ9zQ095jW0DXC1OWF9aSLJMiVnzcq3XxK3kdDSEWY81oBaUhtSdio1m0bmZssEj8wsb59V7mBWOpKl6FWoewEssEhQgNTSfBzN2IghvfXQE02Jcqk2Szcptk_kIK1WCky46aU87c3Q_4Ooupvvw6xaZkmRRnGEVQuRTNsyYeGudd8nXh2TX80ca4Y"/>
<p class="font-body-md text-body-md text-on-surface-variant max-w-sm mt-space-xs">
              Dokumentasi kondisi kamar dan deposit kos yang transparan
            </p>
</div>
<!-- Login Form -->
<form id="loginForm" class="space-y-space-lg" novalidate>
<div id="loginError" class="hidden rounded-lg bg-error-container text-on-error-container font-body-sm text-body-sm px-3 py-2" role="alert"></div>
<!-- Email / Phone Input -->
<div class="flex flex-col gap-space-xs">
<label class="font-label-md text-label-md text-on-surface" for="identifier">
                Email
              </label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-outline pointer-events-none text-[20px]">
                  mail
                </span>
<input class="w-full pl-10 pr-3 py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest transition-colors" id="identifier" name="email" placeholder="owner@kosaudit.test" required="" type="email" autocomplete="username"/>
</div>
</div>
<!-- Password Input -->
<div class="flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md text-on-surface" for="password">
                  Kata Sandi
                </label>
<a class="font-label-sm text-label-sm text-primary hover:text-primary-container transition-colors" href="#forgot">
                  Lupa sandi?
                </a>
</div>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-outline pointer-events-none text-[20px]">
                  lock
                </span>
<input class="w-full pl-10 pr-10 py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest transition-colors" id="password" name="password" placeholder="••••••••••••" required="" type="password"/>
<button aria-label="Tampilkan sandi" class="absolute right-3 text-outline hover:text-on-surface p-1 flex items-center justify-center transition-colors" id="togglePassword" type="button">
<span class="material-symbols-outlined text-[18px]" id="passwordIcon">visibility</span>
</button>
</div>
</div>
<!-- Remember Me Checkbox -->
<div class="flex items-center justify-between pt-space-xs">
<label class="flex items-center gap-space-sm cursor-pointer select-none">
<input class="h-4 w-4 rounded text-primary focus:ring-0 accent-primary cursor-pointer" id="remember" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface-variant">
                  Ingat saya di perangkat ini
                </span>
</label>
</div>
<!-- Primary Action Button -->
<button id="loginBtn" class="w-full py-3 px-space-lg rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg flex items-center justify-center gap-space-sm shadow-md transition-all active:scale-[0.99]" type="submit">
<span>Masuk ke KosAudit</span>
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
</form>
<!-- Divider -->
<div class="relative my-space-lg flex items-center justify-center">
<div class="w-full h-px bg-surface-container-high"></div>
<span class="absolute bg-surface-container-lowest px-space-md font-label-sm text-label-sm text-outline">
              atau masuk dengan Google
            </span>
</div>
<!-- Secondary Google Action -->
<button class="w-full py-2.5 px-space-lg rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center gap-space-sm transition-colors" type="button">
<svg class="w-4 h-4" viewbox="0 0 24 24">
<path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
<path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
<path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"></path>
<path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"></path>
</svg>
<span>Lanjutkan dengan Akun Google</span>
</button>
</div>
<!-- Card Footer -->
<div class="mt-space-xl pt-space-md text-center">
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Belum punya akun? 
            <a class="font-label-md text-label-md text-primary hover:text-primary-container ml-1 transition-colors" href="/register">
              Daftar akun baru
            </a>
</p>
</div>
</div>

</div>
</div>
</div>
<script>
  // Simple interaction for showing/hiding password input
  const toggleBtn = document.getElementById('togglePassword');
  const passwordField = document.getElementById('password');
  const passwordIcon = document.getElementById('passwordIcon');

  if (toggleBtn && passwordField && passwordIcon) {
    toggleBtn.addEventListener('click', () => {
      const isPassword = passwordField.type === 'password';
      passwordField.type = isPassword ? 'text' : 'password';
      passwordIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
    });
  }
</script><script>
  // Login ke API Laravel: POST /api/auth/login
  const form = document.getElementById('loginForm');
  const errBox = document.getElementById('loginError');
  const btn = document.getElementById('loginBtn');
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    errBox.classList.add('hidden');
    btn.disabled = true;
    try {
      const res = await fetch('/api/auth/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
        body: JSON.stringify({
          email: document.getElementById('identifier').value.trim(),
          password: document.getElementById('password').value,
          device_name: 'web'
        })
      });
      const data = await res.json().catch(() => ({}));
      if (!res.ok) {
        const msg = (data.errors && data.errors.email && data.errors.email[0])
          || (data.errors && data.errors.password && data.errors.password[0])
          || (res.status === 429 ? 'Terlalu banyak percobaan. Coba lagi sebentar lagi.' : (data.message || 'Login gagal.'));
        throw new Error(msg);
      }
      const store = document.getElementById('remember').checked ? localStorage : sessionStorage;
      store.setItem('kosaudit_token', data.token);
      store.setItem('kosaudit_user', JSON.stringify(data.user));
      window.location.href = data.user.role === 'owner' ? '/owner/dashboard' : '/tenant/dashboard';
    } catch (err) {
      errBox.textContent = (err instanceof TypeError) ? 'Tidak dapat terhubung ke server. Pastikan server Laravel dan MySQL berjalan.' : err.message;
      errBox.classList.remove('hidden');
    } finally {
      btn.disabled = false;
    }
  });
</script></main></body></html><?php /**PATH C:\Coba\Coba\resources\views/auth/login.blade.php ENDPATH**/ ?>