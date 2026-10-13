<!doctype html>
<html lang="en" data-theme="light">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title','Flowers Shop Management System — Flower Studio')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<style>
:root{--bg:#f7f7f3;--surface:#fff;--surface-2:#f0f1eb;--text:#242a25;--muted:#737b72;--line:#e4e8df;--brand:#285b45;--brand-hover:#1c4634;--accent:#e5a7a0;--shadow:0 14px 38px rgba(31,53,39,.07)}
html[data-theme="dark"]{--bg:#141b17;--surface:#1d2721;--surface-2:#27342c;--text:#f0f4ee;--muted:#a5b2a6;--line:#35443a;--brand:#8bc5a2;--brand-hover:#a2d7b6;--accent:#d99c97;--shadow:0 14px 38px rgba(0,0,0,.22)}
*{box-sizing:border-box}
html,body{min-height:100%}
body{min-height:100vh;display:flex;flex-direction:column;margin:0;background:var(--bg);color:var(--text);font-family:'DM Sans',sans-serif;transition:background .2s,color .2s}
body>main{flex:1 0 auto}
.footer{flex-shrink:0;margin-top:auto!important}
.action-link{display:inline-block;padding:0;border:0;background:none;font:inherit;font-size:.9rem;font-weight:700;text-decoration:none;cursor:pointer}
.action-link-edit{color:var(--brand)}
.action-link-delete{color:#c44747}
.action-link:hover{text-decoration:underline}
.action-separator{color:var(--muted);padding:0 .35rem}
.navbar{background:var(--surface);border-bottom:1px solid var(--line);padding:14px 0}.navbar-brand{font-weight:700;color:var(--text)!important;letter-spacing:-.5px}.brand-mark{display:inline-grid;place-items:center;width:38px;height:38px;border-radius:13px;background:var(--brand);color:#fff;margin-right:8px}.nav-link{color:var(--muted)!important;font-weight:600;font-size:.92rem}.nav-link:hover,.nav-link.active{color:var(--brand)!important}
.page-wrap{max-width:1280px}.card,.panel{background:var(--surface);color:var(--text);border:1px solid var(--line);border-radius:18px;box-shadow:var(--shadow)}.page-title{font-family:'Playfair Display',serif;font-weight:700;letter-spacing:-.4px}.muted,.text-secondary{color:var(--muted)!important}.btn-brand{background:var(--brand);color:#fff;border:1px solid var(--brand);font-weight:700;border-radius:11px;padding:.65rem 1rem}.btn-brand:hover{background:var(--brand-hover);color:#fff}.btn-outline-brand{border:1px solid var(--line);color:var(--text);border-radius:11px;font-weight:600}.btn-outline-brand:hover{border-color:var(--brand);color:var(--brand);background:var(--surface-2)}.form-control,.form-select{background:var(--surface);border-color:var(--line);color:var(--text);border-radius:10px;padding:.68rem .8rem}.form-control:focus,.form-select:focus{background:var(--surface);color:var(--text);border-color:var(--brand);box-shadow:0 0 0 .2rem color-mix(in srgb,var(--brand) 18%,transparent)}.table{color:var(--text);--bs-table-bg:transparent;--bs-table-color:var(--text);--bs-table-border-color:var(--line)}.table thead th{color:var(--muted);font-size:.76rem;text-transform:uppercase;letter-spacing:.08em;font-weight:700;border-bottom-width:1px}.table td{vertical-align:middle}.stat-card{padding:20px;height:100%}.stat-icon{display:grid;place-items:center;width:44px;height:44px;border-radius:14px;background:var(--surface-2);font-size:1.2rem}.stat-value{font-size:2rem;font-weight:700;letter-spacing:-1px}.pill{border-radius:999px;padding:5px 10px;font-size:.78rem;font-weight:700;background:var(--surface-2);color:var(--text)}.hero{background:linear-gradient(125deg,var(--surface),var(--surface-2));overflow:hidden;position:relative}.hero-orb{position:absolute;right:6%;top:-45px;font-size:10rem;opacity:.22;transform:rotate(-12deg)}.flower-emoji{width:42px;height:42px;display:grid;place-items:center;background:var(--surface-2);border-radius:13px;font-size:1.3rem}.product-card{overflow:hidden;transition:transform .2s,box-shadow .2s}.product-card:hover{transform:translateY(-4px);box-shadow:0 20px 42px rgba(31,53,39,.12)}.product-art{height:150px;background:linear-gradient(135deg,var(--surface-2),color-mix(in srgb,var(--accent) 28%,var(--surface)));display:grid;place-items:center;font-size:4rem}.alert{border-radius:12px}.theme-toggle{border:1px solid var(--line);background:var(--surface);color:var(--text);border-radius:11px;padding:8px 11px}.footer{color:var(--muted);border-top:1px solid var(--line)}a{color:var(--brand)}html[data-theme="dark"] .btn-outline-secondary{color:var(--text);border-color:var(--line)}html[data-theme="dark"] .btn-close{filter:invert(1)}
</style>
<script>
(function(){try{const t=localStorage.getItem('bloom-theme')||'light';document.documentElement.setAttribute('data-theme',t)}catch(e){}})();
</script>
</head>
<body>
<nav class="navbar navbar-expand-xl sticky-top"><div class="container page-wrap">
<a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}"><span class="brand-mark">✿</span><span>Flowers Shop Management System</span></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="mainNav">
<ul class="navbar-nav ms-xl-4 me-auto gap-xl-2">
<li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('admin.flowers.index') }}">Flowers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('admin.suppliers.index') }}">Suppliers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('admin.customers.index') }}">Customers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('admin.orders.index') }}">Orders</a></li>
</ul>
<div class="d-flex align-items-center gap-2 mt-3 mt-xl-0">
<button id="themeToggle" class="theme-toggle" type="button" aria-label="Toggle light and dark theme">◐ <span id="themeLabel">Dark mode</span></button>

</div>
</div></div></nav>
<main class="container page-wrap py-4 py-lg-5">
@if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>@endif
@if(session('error'))<div class="alert alert-danger alert-dismissible fade show" role="alert">{{ session('error') }}<button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>@endif
@if($errors->any())<div class="alert alert-danger" role="alert"><strong>Please review the following:</strong><ul class="mb-0 mt-2">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
@yield('content')
</main>
<footer class="footer py-4"><div class="container page-wrap d-flex flex-column flex-md-row justify-content-between gap-2"><span>© {{ date('Y') }} Flowers Shop Management System Flower Studio</span><span>Thoughtfully grown. Beautifully managed.</span></div></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
(function(){const root=document.documentElement,btn=document.getElementById('themeToggle'),label=document.getElementById('themeLabel');function paint(){const dark=root.getAttribute('data-theme')==='dark';label.textContent=dark?'Light mode':'Dark mode';btn.setAttribute('aria-pressed',String(dark))}paint();btn.addEventListener('click',function(){const next=root.getAttribute('data-theme')==='dark'?'light':'dark';root.setAttribute('data-theme',next);try{localStorage.setItem('bloom-theme',next)}catch(e){}paint()})})();
</script>
@stack('scripts')
</body></html>
