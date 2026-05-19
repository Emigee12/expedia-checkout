<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Critical for Mobile -->
<title>Secure Booking – Expedia Clone</title>
<style>
/* ── Reset & Base ── */
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:Arial,sans-serif;background:#f5f5f5;color:#1a1a1a;font-size:14px;line-height:1.5}

/* ── Header ── */
.hdr{border-bottom:1px solid #e0e0e0;display:flex;align-items:center;padding:16px 24px; background: #fff;}
.logo{display:flex;align-items:center;gap:7px;text-decoration:none;}
.logo-box{width:28px;height:28px;background:#c8a84b;border-radius:3px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.logo-box svg{width:16px;height:16px}
.logo-text{font-size:19px;font-weight:700;color:#1a1a1a;letter-spacing:-.3px}

/* ── Outer layout ── */
.pg-wrap{max-width:1180px;margin:0 auto;padding:16px 24px 60px}
.pg-title{font-size:22px;font-weight:700;color:#1a1a1a;margin-bottom:14px}
.cols{display:flex;gap:22px;align-items:flex-start}
.col-main{flex:1 1 0;min-width:0;display:flex;flex-direction:column;gap:0}
.col-side{flex:0 0 318px}

/* ── OneKey banner ── */
.onekey{background:#1b2b4b;color:#fff;border-radius:6px;padding:14px 18px;display:flex;align-items:center;justify-content:space-between;cursor:pointer;margin-bottom:14px}
.ok-left{display:flex;align-items:center;gap:14px}
.ok-icon{width:38px;height:38px;border:1.5px solid rgba(255,255,255,.35);border-radius:50%;display:grid;place-items:center;flex-shrink:0}
.ok-icon svg{width:22px;height:22px;fill:#fff}
.ok-text{font-size:14px;line-height:1.4}
.ok-arr{width:30px;height:30px;background:rgba(255,255,255,.15);border:none;border-radius:4px;color:#fff;font-size:20px;cursor:pointer;display:grid;place-items:center;flex-shrink:0;line-height:1}

/* ── Cards / sections ── */
.card{background:#fff;border:1px solid #d8d8d8;border-radius:8px;overflow:hidden;margin-bottom:14px}
.sec{padding:22px 26px}
.sec+.sec{border-top:1px solid #e6e6e6}
.sec-h{font-size:18px;font-weight:700;margin-bottom:4px}
.sec-sub{font-size:13px;color:#6b6b6b;margin-bottom:6px}
.req-note{font-size:13px;color:#6b6b6b;margin-bottom:16px}

/* ── Form elements ── */
.fg{margin-bottom:16px}
.lbl{display:block;font-size:13px;color:#1a1a1a;margin-bottom:5px}
.lbl .r{color:#c00}
input[type=text],input[type=email],input[type=tel],select{width:100%;padding:9px 11px;border:1px solid #949494;border-radius:4px;font-size:14px;color:#1a1a1a;background:#fff}
input[type=text]:focus,input[type=email]:focus,input[type=tel]:focus,select:focus{outline:none;border-color:#006fcf;box-shadow:0 0 0 1px #006fcf}
select{background:#f7f7f7;appearance:auto;cursor:pointer}
input.err,select.err{border:2px solid #c00 !important;background:#fff}
input[type=email].err{background:#fff8f8}
.emsg{color:#c00;font-size:12px;margin-top:4px;display:flex;align-items:flex-start;gap:3px;line-height:1.4}
.emsg::before{content:"▲";font-size:10px;margin-top:1px;flex-shrink:0}
.row{display:flex;gap:12px}
.col{flex:1;min-width:0}
.rg{display:flex;gap:20px;margin-top:4px}
.rg label{display:flex;align-items:center;gap:7px;font-size:14px;cursor:pointer;font-weight:normal}
.ck{display:flex;align-items:flex-start;gap:8px;font-size:13px;color:#1a1a1a}
.ck input[type=checkbox]{width:auto;margin-top:2px;flex-shrink:0}
.ff-link{color:#006fcf;font-size:13px;text-decoration:none;display:inline-flex;align-items:center;gap:4px;margin-top:4px}
.ff-link:hover{text-decoration:underline}

/* ── Promo card ── */
.promo-wrap{background:#fff;border:1px solid #d8d8d8;border-radius:8px;overflow:hidden;margin-bottom:14px}
.promo-hdr{background:#ddeeff;text-align:center;padding:10px;font-size:14px;font-weight:700;color:#1a1a1a;border-bottom:1px solid #c8ddf0}
.promo-body{display:flex;gap:18px;padding:18px 22px;align-items:flex-start}
.promo-card-img{width:72px;height:48px;background:#1a3a6b;border-radius:6px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:13px;font-weight:700;flex-shrink:0;position:relative;overflow:hidden}
.promo-card-chip{width:10px;height:8px;background:#c8a84b;border-radius:1px;position:absolute;bottom:10px;left:8px}
.promo-mid{flex:1;font-size:13px;line-height:1.6}
.promo-mid strong{font-size:14px;display:block;margin-bottom:3px}
.promo-mid .terms{color:#6b6b6b;font-size:12px}
.promo-mid .no-fee{color:#006fcf;font-size:12px;text-decoration:none;display:block;margin-top:6px}
.promo-right{display:flex;flex-direction:column;gap:4px;min-width:200px}
.promo-row{display:flex;justify-content:space-between;font-size:13px;padding:2px 0}
.promo-row.credit{color:#1a7a1a;font-weight:700}
.promo-get{background:#006fcf;color:#fff;border:none;border-radius:4px;padding:10px;font-size:14px;font-weight:700;cursor:pointer;width:100%;margin-top:6px}
.promo-get:hover{background:#005aa3}
.promo-check{font-size:12px;color:#6b6b6b;margin-top:4px;text-align:center}

/* card brand icons */
.card-brands{display:flex;gap:6px;align-items:center;margin-bottom:16px;flex-wrap:wrap}
.exp-row{display:flex;gap:10px}
.bill-divider{border:none;border-top:1px solid #e0e0e0;margin:6px 0 20px}

/* ── Protection Section ── */
.protect-section{background:#fff;border:1px solid #d8d8d8;border-radius:8px;padding:22px 26px;margin-bottom:14px}
.protect-header{display:flex;align-items:center;gap:8px;margin-bottom:15px}
.rec-badge{background:#27ae60;color:#fff;font-size:11px;font-weight:700;padding:2px 6px;border-radius:3px;text-transform:uppercase}
.protect-title{font-size:18px;font-weight:700}
.protect-desc{font-size:13px;color:#555;margin-bottom:15px}
.protect-options{display:flex;gap:15px}
.protect-opt{flex:1;border:1px solid #d0d0d0;border-radius:6px;padding:15px;cursor:pointer;transition:all 0.2s;position:relative}
.protect-opt:hover{border-color:#006fcf;background:#f0f8ff}
.protect-opt.selected{border-color:#006fcf;background:#f0f8ff;box-shadow:0 0 0 1px #006fcf}
.protect-opt input{position:absolute;top:15px;right:15px;width:18px;height:18px;cursor:pointer}
.opt-name{font-weight:700;font-size:14px;margin-bottom:5px;display:block}
.opt-price{font-size:13px;color:#555;margin-bottom:10px;display:block}
.opt-benefits{list-style:none;padding:0;margin:0;font-size:12px;color:#333}
.opt-benefits li{margin-bottom:4px;display:flex;align-items:flex-start;gap:5px}
.opt-benefits li::before{content:"✓";color:#27ae60;font-weight:bold}

/* ── Review section ── */
.review-card{background:#fff;border:1px solid #d8d8d8;border-radius:8px;padding:22px 26px;margin-bottom:14px}
.review-card h2{font-size:20px;font-weight:700;margin-bottom:14px}
.review-list{padding-left:18px;margin-bottom:14px}
.review-list>li{margin-bottom:8px;font-size:14px;line-height:1.5}
.terms-scroll{max-height:130px;overflow-y:auto;border:1px solid #d0d0d0;border-radius:4px;padding:10px 12px;margin-bottom:14px;background:#fafafa;position:relative}
.terms-scroll ul{padding-left:18px}
.terms-scroll li{font-size:13px;line-height:1.5;margin-bottom:8px;color:#333}
.consent-text{font-size:13px;color:#333;margin-bottom:16px;line-height:1.6}
.consent-text a{color:#006fcf;text-decoration:none}
.consent-text a:hover{text-decoration:underline}
.btn-book{background:#006fcf;color:#fff;border:none;border-radius:4px;padding:12px 24px;font-size:16px;font-weight:700;cursor:pointer;display:inline-flex;align-items:center;gap:8px; width: 100%; justify-content: center;}
.btn-book:hover{background:#005aa3}
.secure-note{display:flex;align-items:flex-start;gap:8px;font-size:13px;color:#555;margin-top:14px}
.secure-note svg{flex-shrink:0;margin-top:1px}

/* ── Bundle & Save ── */
.bundle-bar{background:#fef9e7;border:1px solid #e8daa0;border-radius:8px;padding:16px 20px;display:flex;align-items:center;gap:14px;margin-bottom:20px}
.bundle-icon{width:40px;height:40px;background:#f4b400;border-radius:50%;display:grid;place-items:center;flex-shrink:0}
.bundle-icon svg{width:22px;height:22px}
.bundle-txt strong{font-size:14px;font-weight:700;display:block;margin-bottom:2px}
.bundle-txt span{font-size:13px;color:#555}
.feedback-row{text-align:center;padding:10px 0 20px}
.feedback-row a{color:#006fcf;font-size:14px;text-decoration:none}
.feedback-row a:hover{text-decoration:underline}

/* ── Footer ─ */
.footer{background:#f0f0f0;border-top:1px solid #ddd;padding:24px 20px 16px;text-align:center}
.footer-links{display:flex;justify-content:center;gap:24px;flex-wrap:wrap;margin-bottom:8px}
.footer-links a{font-size:13px;color:#333;text-decoration:none}
.footer-links a:hover{text-decoration:underline}
.footer-copy{font-size:12px;color:#555;margin-bottom:14px}
.footer-logo{font-size:22px;font-weight:700;color:#1b2b4b;letter-spacing:-1px}

/* ── Sidebar ── */
.side-card{background:#fff;border:1px solid #d8d8d8;border-radius:8px;padding:18px 20px;position:sticky;top:16px}
.side-card h3{font-size:18px;font-weight:700;margin-bottom:2px}
.side-meta{font-size:13px;color:#6b6b6b;margin-bottom:12px}
.side-divider{border:none;border-top:1px solid #e0e0e0;margin:12px 0}
.flt-route{font-size:14px;font-weight:700;margin-bottom:2px}
.flt-date{font-size:13px;font-weight:700;margin-bottom:1px}
.flt-time{font-size:13px;color:#333;margin-bottom:3px}
.flt-airline{font-size:13px;display:flex;align-items:flex-start;gap:4px}
.al-warn{color:#c00}.al-ok{color:#27ae60}
.smart{font-size:13px;color:#27ae60;display:flex;align-items:flex-start;gap:6px;padding:10px 0;border-top:1px solid #e0e0e0;border-bottom:1px solid #e0e0e0;margin:12px 0}
.ps-title{font-size:15px;font-weight:700;margin-bottom:10px}
.ps-trav-row{display:flex;justify-content:space-between;align-items:center;font-size:14px;margin-bottom:2px}
.ps-trav-row a{color:#006fcf;text-decoration:none;display:inline-flex;align-items:center;gap:3px}
.ps-trav-row a:hover{text-decoration:underline}
.ps-sub{display:flex;justify-content:space-between;font-size:13px;color:#444;padding-left:10px;margin-bottom:8px}
.ps-row{display:flex;justify-content:space-between;font-size:14px;margin-bottom:8px}
.ps-total{display:flex;justify-content:space-between;font-size:14px;padding-top:8px;border-top:1px solid #e0e0e0;margin-top:4px}
.side-note{font-size:12px;color:#6b6b6b;margin-top:14px;line-height:1.5}

/* ─────────────────────────────────────────── */
/* ── MOBILE RESPONSIVE STYLES ── */
/* ─────────────────────────────────────────── */
@media(max-width: 900px){
    /* Stack Columns: Sidebar goes to TOP on mobile */
    .cols {
        flex-direction: column-reverse; /* Main content bottom, Sidebar top */
    }
    
    .col-side {
        width: 100%;
        flex: none;
        position: static; /* Stop sticking on mobile */
        margin-bottom: 20px;
    }

    .col-main {
        width: 100%;
    }

    /* Header Adjustments */
    .hdr {
        padding: 12px 16px;
    }
    .logo-text {
        font-size: 16px;
    }

    /* Form Rows Stack Vertically */
    .row {
        flex-direction: column;
        gap: 16px;
    }
    
    .col {
        width: 100%;
    }

    /* Date of Birth & Expiry Date Stacking */
    .exp-row, 
    div[style*="display:flex;gap:10px"] {
        flex-direction: column !important;
        gap: 10px !important;
    }
    
    /* Fix specific inline styles for DOB/Expiry selects */
    select[name="dob_month"], select[name="dob_day"], select[name="dob_year"],
    select[name="exp_month"], select[name="exp_year"] {
        width: 100% !important;
    }

    /* Protection Plan Stacking */
    .protect-options {
        flex-direction: column;
    }

    /* Promo Card Stacking */
    .promo-body {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .promo-right {
        width: 100%;
        min-width: auto;
    }

    /* Sidebar Flight Details */
    .flt-route, .flt-date, .flt-time, .flt-airline {
        font-size: 13px;
    }
}
</style>
</head>
<body>

<!-- HEADER -->
<header class="hdr">
  <a href="#" class="logo">
    <span class="logo-box">
      <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 4h9v2.5H9.8L16 12.7l-1.8 1.8L8 8.3V11H5.5V4H4z" fill="#fff"/>
        <rect x="4" y="15" width="12" height="2" fill="#fff"/>
      </svg>
    </span>
    <span class="logo-text">Expedia</span>
  </a>
</header>

<div class="pg-wrap">
  <h1 class="pg-title">Secure booking - only takes a few minutes!</h1>

  <div class="cols">

    <!-- LEFT COLUMN (Main Form) -->
    <div class="col-main">

      <!-- OneKeyCash Banner -->
      <div class="onekey">
        <div class="ok-left">
          <div class="ok-icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <circle cx="12" cy="4.5" r="2"/><circle cx="19" cy="8.5" r="2"/>
              <circle cx="19" cy="15.5" r="2"/><circle cx="12" cy="19.5" r="2"/>
              <circle cx="5" cy="15.5" r="2"/><circle cx="5" cy="8.5" r="2"/>
              <circle cx="12" cy="12" r="2"/>
            </svg>
          </div>
          <span class="ok-text">Sign in or create an account to earn OneKeyCash™ after this trip.</span>
        </div>
        <button class="ok-arr">›</button>
      </div>

      <!-- Who's traveling -->
      <div class="card">
        <div class="sec">
          <h2 class="sec-h">Who's traveling?</h2>
          <p class="sec-sub">Traveler names must match government-issued photo ID exactly.</p>
          <p class="req-note">* Required</p>

          <form method="POST" action="{{ route('checkout.store') }}">
          @csrf

          <!-- Name -->
          <div class="row fg">
            <div class="col">
              <label class="lbl">First name <span class="r">*</span></label>
              <input type="text" name="first_name" value="{{ old('first_name') }}" class="{{ $errors->has('first_name')?'err':'' }}">
              @error('first_name')<div class="emsg">{{ $message }}</div>@enderror
            </div>
            <div class="col">
              <label class="lbl">Middle name</label>
              <input type="text" name="middle_name" value="{{ old('middle_name') }}">
            </div>
            <div class="col">
              <label class="lbl">Last name <span class="r">*</span></label>
              <input type="text" name="last_name" value="{{ old('last_name') }}" class="{{ $errors->has('last_name')?'err':'' }}">
              @error('last_name')<div class="emsg">{{ $message }}</div>@enderror
            </div>
          </div>

          <!-- Email -->
          <div class="fg">
            <label class="lbl">Email address <span class="r">*</span></label>
            <input type="email" name="email" placeholder="Email for confirmation" value="{{ old('email') }}" class="{{ $errors->has('email')?'err':'' }}">
            @error('email')<div class="emsg">{{ $message }}</div>@enderror
          </div>

          <!-- Country code -->
          <div class="fg">
            <label class="lbl">Country/Territory Code <span class="r">*</span></label>
            <select name="country_code">
                <option value="">Select Country Code</option>
                <option value="+93"  {{ old('country_code')=='+93' ?'selected':'' }}>Afghanistan +93</option>
                <option value="+355" {{ old('country_code')=='+355'?'selected':'' }}>Albania +355</option>
                <option value="+213" {{ old('country_code')=='+213'?'selected':'' }}>Algeria +213</option>
                <option value="+376" {{ old('country_code')=='+376'?'selected':'' }}>Andorra +376</option>
                <option value="+244" {{ old('country_code')=='+244'?'selected':'' }}>Angola +244</option>
                <option value="+54"  {{ old('country_code')=='+54' ?'selected':'' }}>Argentina +54</option>
                <option value="+374" {{ old('country_code')=='+374'?'selected':'' }}>Armenia +374</option>
                <option value="+61"  {{ old('country_code')=='+61' ?'selected':'' }}>Australia +61</option>
                <option value="+43"  {{ old('country_code')=='+43' ?'selected':'' }}>Austria +43</option>
                <option value="+994" {{ old('country_code')=='+994'?'selected':'' }}>Azerbaijan +994</option>
                <option value="+973" {{ old('country_code')=='+973'?'selected':'' }}>Bahrain +973</option>
                <option value="+880" {{ old('country_code')=='+880'?'selected':'' }}>Bangladesh +880</option>
                <option value="+375" {{ old('country_code')=='+375'?'selected':'' }}>Belarus +375</option>
                <option value="+32"  {{ old('country_code')=='+32' ?'selected':'' }}>Belgium +32</option>
                <option value="+501" {{ old('country_code')=='+501'?'selected':'' }}>Belize +501</option>
                <option value="+229" {{ old('country_code')=='+229'?'selected':'' }}>Benin +229</option>
                <option value="+975" {{ old('country_code')=='+975'?'selected':'' }}>Bhutan +975</option>
                <option value="+591" {{ old('country_code')=='+591'?'selected':'' }}>Bolivia +591</option>
                <option value="+387" {{ old('country_code')=='+387'?'selected':'' }}>Bosnia and Herzegovina +387</option>
                <option value="+267" {{ old('country_code')=='+267'?'selected':'' }}>Botswana +267</option>
                <option value="+55"  {{ old('country_code')=='+55' ?'selected':'' }}>Brazil +55</option>
                <option value="+673" {{ old('country_code')=='+673'?'selected':'' }}>Brunei +673</option>
                <option value="+359" {{ old('country_code')=='+359'?'selected':'' }}>Bulgaria +359</option>
                <option value="+226" {{ old('country_code')=='+226'?'selected':'' }}>Burkina Faso +226</option>
                <option value="+257" {{ old('country_code')=='+257'?'selected':'' }}>Burundi +257</option>
                <option value="+855" {{ old('country_code')=='+855'?'selected':'' }}>Cambodia +855</option>
                <option value="+237" {{ old('country_code')=='+237'?'selected':'' }}>Cameroon +237</option>
                <option value="+1"   {{ old('country_code','+1')=='+1'?'selected':'' }}>Canada +1</option>
                <option value="+238" {{ old('country_code')=='+238'?'selected':'' }}>Cape Verde +238</option>
                <option value="+236" {{ old('country_code')=='+236'?'selected':'' }}>Central African Republic +236</option>
                <option value="+235" {{ old('country_code')=='+235'?'selected':'' }}>Chad +235</option>
                <option value="+56"  {{ old('country_code')=='+56' ?'selected':'' }}>Chile +56</option>
                <option value="+86"  {{ old('country_code')=='+86' ?'selected':'' }}>China +86</option>
                <option value="+57"  {{ old('country_code')=='+57' ?'selected':'' }}>Colombia +57</option>
                <option value="+269" {{ old('country_code')=='+269'?'selected':'' }}>Comoros +269</option>
                <option value="+242" {{ old('country_code')=='+242'?'selected':'' }}>Congo +242</option>
                <option value="+243" {{ old('country_code')=='+243'?'selected':'' }}>Congo (DRC) +243</option>
                <option value="+506" {{ old('country_code')=='+506'?'selected':'' }}>Costa Rica +506</option>
                <option value="+225" {{ old('country_code')=='+225'?'selected':'' }}>Côte d'Ivoire +225</option>
                <option value="+385" {{ old('country_code')=='+385'?'selected':'' }}>Croatia +385</option>
                <option value="+53"  {{ old('country_code')=='+53' ?'selected':'' }}>Cuba +53</option>
                <option value="+357" {{ old('country_code')=='+357'?'selected':'' }}>Cyprus +357</option>
                <option value="+420" {{ old('country_code')=='+420'?'selected':'' }}>Czech Republic +420</option>
                <option value="+45"  {{ old('country_code')=='+45' ?'selected':'' }}>Denmark +45</option>
                <option value="+253" {{ old('country_code')=='+253'?'selected':'' }}>Djibouti +253</option>
                <option value="+1"   {{ old('country_code')=='+1Dominican'?'selected':'' }}>Dominican Republic +1</option>
                <option value="+593" {{ old('country_code')=='+593'?'selected':'' }}>Ecuador +593</option>
                <option value="+20"  {{ old('country_code')=='+20' ?'selected':'' }}>Egypt +20</option>
                <option value="+503" {{ old('country_code')=='+503'?'selected':'' }}>El Salvador +503</option>
                <option value="+240" {{ old('country_code')=='+240'?'selected':'' }}>Equatorial Guinea +240</option>
                <option value="+291" {{ old('country_code')=='+291'?'selected':'' }}>Eritrea +291</option>
                <option value="+372" {{ old('country_code')=='+372'?'selected':'' }}>Estonia +372</option>
                <option value="+268" {{ old('country_code')=='+268'?'selected':'' }}>Eswatini +268</option>
                <option value="+251" {{ old('country_code')=='+251'?'selected':'' }}>Ethiopia +251</option>
                <option value="+679" {{ old('country_code')=='+679'?'selected':'' }}>Fiji +679</option>
                <option value="+358" {{ old('country_code')=='+358'?'selected':'' }}>Finland +358</option>
                <option value="+33"  {{ old('country_code')=='+33' ?'selected':'' }}>France +33</option>
                <option value="+241" {{ old('country_code')=='+241'?'selected':'' }}>Gabon +241</option>
                <option value="+220" {{ old('country_code')=='+220'?'selected':'' }}>Gambia +220</option>
                <option value="+995" {{ old('country_code')=='+995'?'selected':'' }}>Georgia +995</option>
                <option value="+49"  {{ old('country_code')=='+49' ?'selected':'' }}>Germany +49</option>
                <option value="+233" {{ old('country_code')=='+233'?'selected':'' }}>Ghana +233</option>
                <option value="+30"  {{ old('country_code')=='+30' ?'selected':'' }}>Greece +30</option>
                <option value="+502" {{ old('country_code')=='+502'?'selected':'' }}>Guatemala +502</option>
                <option value="+224" {{ old('country_code')=='+224'?'selected':'' }}>Guinea +224</option>
                <option value="+245" {{ old('country_code')=='+245'?'selected':'' }}>Guinea-Bissau +245</option>
                <option value="+592" {{ old('country_code')=='+592'?'selected':'' }}>Guyana +592</option>
                <option value="+509" {{ old('country_code')=='+509'?'selected':'' }}>Haiti +509</option>
                <option value="+504" {{ old('country_code')=='+504'?'selected':'' }}>Honduras +504</option>
                <option value="+852" {{ old('country_code')=='+852'?'selected':'' }}>Hong Kong +852</option>
                <option value="+36"  {{ old('country_code')=='+36' ?'selected':'' }}>Hungary +36</option>
                <option value="+354" {{ old('country_code')=='+354'?'selected':'' }}>Iceland +354</option>
                <option value="+91"  {{ old('country_code')=='+91' ?'selected':'' }}>India +91</option>
                <option value="+62"  {{ old('country_code')=='+62' ?'selected':'' }}>Indonesia +62</option>
                <option value="+98"  {{ old('country_code')=='+98' ?'selected':'' }}>Iran +98</option>
                <option value="+964" {{ old('country_code')=='+964'?'selected':'' }}>Iraq +964</option>
                <option value="+353" {{ old('country_code')=='+353'?'selected':'' }}>Ireland +353</option>
                <option value="+972" {{ old('country_code')=='+972'?'selected':'' }}>Israel +972</option>
                <option value="+39"  {{ old('country_code')=='+39' ?'selected':'' }}>Italy +39</option>
                <option value="+1876"{{ old('country_code')=='+1876'?'selected':'' }}>Jamaica +1876</option>
                <option value="+81"  {{ old('country_code')=='+81' ?'selected':'' }}>Japan +81</option>
                <option value="+962" {{ old('country_code')=='+962'?'selected':'' }}>Jordan +962</option>
                <option value="+7"   {{ old('country_code')=='+7Kazakhstan'?'selected':'' }}>Kazakhstan +7</option>
                <option value="+254" {{ old('country_code')=='+254'?'selected':'' }}>Kenya +254</option>
                <option value="+383" {{ old('country_code')=='+383'?'selected':'' }}>Kosovo +383</option>
                <option value="+965" {{ old('country_code')=='+965'?'selected':'' }}>Kuwait +965</option>
                <option value="+996" {{ old('country_code')=='+996'?'selected':'' }}>Kyrgyzstan +996</option>
                <option value="+856" {{ old('country_code')=='+856'?'selected':'' }}>Laos +856</option>
                <option value="+371" {{ old('country_code')=='+371'?'selected':'' }}>Latvia +371</option>
                <option value="+961" {{ old('country_code')=='+961'?'selected':'' }}>Lebanon +961</option>
                <option value="+266" {{ old('country_code')=='+266'?'selected':'' }}>Lesotho +266</option>
                <option value="+231" {{ old('country_code')=='+231'?'selected':'' }}>Liberia +231</option>
                <option value="+218" {{ old('country_code')=='+218'?'selected':'' }}>Libya +218</option>
                <option value="+423" {{ old('country_code')=='+423'?'selected':'' }}>Liechtenstein +423</option>
                <option value="+370" {{ old('country_code')=='+370'?'selected':'' }}>Lithuania +370</option>
                <option value="+352" {{ old('country_code')=='+352'?'selected':'' }}>Luxembourg +352</option>
                <option value="+853" {{ old('country_code')=='+853'?'selected':'' }}>Macau +853</option>
                <option value="+261" {{ old('country_code')=='+261'?'selected':'' }}>Madagascar +261</option>
                <option value="+265" {{ old('country_code')=='+265'?'selected':'' }}>Malawi +265</option>
                <option value="+60"  {{ old('country_code')=='+60' ?'selected':'' }}>Malaysia +60</option>
                <option value="+960" {{ old('country_code')=='+960'?'selected':'' }}>Maldives +960</option>
                <option value="+223" {{ old('country_code')=='+223'?'selected':'' }}>Mali +223</option>
                <option value="+356" {{ old('country_code')=='+356'?'selected':'' }}>Malta +356</option>
                <option value="+222" {{ old('country_code')=='+222'?'selected':'' }}>Mauritania +222</option>
                <option value="+230" {{ old('country_code')=='+230'?'selected':'' }}>Mauritius +230</option>
                <option value="+52"  {{ old('country_code')=='+52' ?'selected':'' }}>Mexico +52</option>
                <option value="+373" {{ old('country_code')=='+373'?'selected':'' }}>Moldova +373</option>
                <option value="+976" {{ old('country_code')=='+976'?'selected':'' }}>Mongolia +976</option>
                <option value="+382" {{ old('country_code')=='+382'?'selected':'' }}>Montenegro +382</option>
                <option value="+212" {{ old('country_code')=='+212'?'selected':'' }}>Morocco +212</option>
                <option value="+258" {{ old('country_code')=='+258'?'selected':'' }}>Mozambique +258</option>
                <option value="+95"  {{ old('country_code')=='+95' ?'selected':'' }}>Myanmar +95</option>
                <option value="+264" {{ old('country_code')=='+264'?'selected':'' }}>Namibia +264</option>
                <option value="+977" {{ old('country_code')=='+977'?'selected':'' }}>Nepal +977</option>
                <option value="+31"  {{ old('country_code')=='+31' ?'selected':'' }}>Netherlands +31</option>
                <option value="+64"  {{ old('country_code')=='+64' ?'selected':'' }}>New Zealand +64</option>
                <option value="+505" {{ old('country_code')=='+505'?'selected':'' }}>Nicaragua +505</option>
                <option value="+227" {{ old('country_code')=='+227'?'selected':'' }}>Niger +227</option>
                <option value="+234" {{ old('country_code')=='+234'?'selected':'' }}>Nigeria +234</option>
                <option value="+850" {{ old('country_code')=='+850'?'selected':'' }}>North Korea +850</option>
                <option value="+389" {{ old('country_code')=='+389'?'selected':'' }}>North Macedonia +389</option>
                <option value="+47"  {{ old('country_code')=='+47' ?'selected':'' }}>Norway +47</option>
                <option value="+968" {{ old('country_code')=='+968'?'selected':'' }}>Oman +968</option>
                <option value="+92"  {{ old('country_code')=='+92' ?'selected':'' }}>Pakistan +92</option>
                <option value="+507" {{ old('country_code')=='+507'?'selected':'' }}>Panama +507</option>
                <option value="+675" {{ old('country_code')=='+675'?'selected':'' }}>Papua New Guinea +675</option>
                <option value="+595" {{ old('country_code')=='+595'?'selected':'' }}>Paraguay +595</option>
                <option value="+51"  {{ old('country_code')=='+51' ?'selected':'' }}>Peru +51</option>
                <option value="+63"  {{ old('country_code')=='+63' ?'selected':'' }}>Philippines +63</option>
                <option value="+48"  {{ old('country_code')=='+48' ?'selected':'' }}>Poland +48</option>
                <option value="+351" {{ old('country_code')=='+351'?'selected':'' }}>Portugal +351</option>
                <option value="+974" {{ old('country_code')=='+974'?'selected':'' }}>Qatar +974</option>
                <option value="+40"  {{ old('country_code')=='+40' ?'selected':'' }}>Romania +40</option>
                <option value="+7"   {{ old('country_code')=='+7Russia'?'selected':'' }}>Russia +7</option>
                <option value="+250" {{ old('country_code')=='+250'?'selected':'' }}>Rwanda +250</option>
                <option value="+966" {{ old('country_code')=='+966'?'selected':'' }}>Saudi Arabia +966</option>
                <option value="+221" {{ old('country_code')=='+221'?'selected':'' }}>Senegal +221</option>
                <option value="+381" {{ old('country_code')=='+381'?'selected':'' }}>Serbia +381</option>
                <option value="+232" {{ old('country_code')=='+232'?'selected':'' }}>Sierra Leone +232</option>
                <option value="+65"  {{ old('country_code')=='+65' ?'selected':'' }}>Singapore +65</option>
                <option value="+421" {{ old('country_code')=='+421'?'selected':'' }}>Slovakia +421</option>
                <option value="+386" {{ old('country_code')=='+386'?'selected':'' }}>Slovenia +386</option>
                <option value="+252" {{ old('country_code')=='+252'?'selected':'' }}>Somalia +252</option>
                <option value="+27"  {{ old('country_code')=='+27' ?'selected':'' }}>South Africa +27</option>
                <option value="+82"  {{ old('country_code')=='+82' ?'selected':'' }}>South Korea +82</option>
                <option value="+211" {{ old('country_code')=='+211'?'selected':'' }}>South Sudan +211</option>
                <option value="+34"  {{ old('country_code')=='+34' ?'selected':'' }}>Spain +34</option>
                <option value="+94"  {{ old('country_code')=='+94' ?'selected':'' }}>Sri Lanka +94</option>
                <option value="+249" {{ old('country_code')=='+249'?'selected':'' }}>Sudan +249</option>
                <option value="+597" {{ old('country_code')=='+597'?'selected':'' }}>Suriname +597</option>
                <option value="+46"  {{ old('country_code')=='+46' ?'selected':'' }}>Sweden +46</option>
                <option value="+41"  {{ old('country_code')=='+41' ?'selected':'' }}>Switzerland +41</option>
                <option value="+963" {{ old('country_code')=='+963'?'selected':'' }}>Syria +963</option>
                <option value="+886" {{ old('country_code')=='+886'?'selected':'' }}>Taiwan +886</option>
                <option value="+992" {{ old('country_code')=='+992'?'selected':'' }}>Tajikistan +992</option>
                <option value="+255" {{ old('country_code')=='+255'?'selected':'' }}>Tanzania +255</option>
                <option value="+66"  {{ old('country_code')=='+66' ?'selected':'' }}>Thailand +66</option>
                <option value="+228" {{ old('country_code')=='+228'?'selected':'' }}>Togo +228</option>
                <option value="+1868"{{ old('country_code')=='+1868'?'selected':'' }}>Trinidad and Tobago +1868</option>
                <option value="+216" {{ old('country_code')=='+216'?'selected':'' }}>Tunisia +216</option>
                <option value="+90"  {{ old('country_code')=='+90' ?'selected':'' }}>Turkey +90</option>
                <option value="+993" {{ old('country_code')=='+993'?'selected':'' }}>Turkmenistan +993</option>
                <option value="+256" {{ old('country_code')=='+256'?'selected':'' }}>Uganda +256</option>
                <option value="+380" {{ old('country_code')=='+380'?'selected':'' }}>Ukraine +380</option>
                <option value="+971" {{ old('country_code')=='+971'?'selected':'' }}>United Arab Emirates +971</option>
                <option value="+44"  {{ old('country_code')=='+44' ?'selected':'' }}>United Kingdom +44</option>
                <option value="+1"   {{ old('country_code','+1')=='+1'?'selected':'' }}>United States +1</option>
                <option value="+598" {{ old('country_code')=='+598'?'selected':'' }}>Uruguay +598</option>
                <option value="+998" {{ old('country_code')=='+998'?'selected':'' }}>Uzbekistan +998</option>
                <option value="+58"  {{ old('country_code')=='+58' ?'selected':'' }}>Venezuela +58</option>
                <option value="+84"  {{ old('country_code')=='+84' ?'selected':'' }}>Vietnam +84</option>
                <option value="+967" {{ old('country_code')=='+967'?'selected':'' }}>Yemen +967</option>
                <option value="+260" {{ old('country_code')=='+260'?'selected':'' }}>Zambia +260</option>
                <option value="+263" {{ old('country_code')=='+263'?'selected':'' }}>Zimbabwe +263</option>
            </select>
          </div>

          <!-- Phone -->
          <div class="fg">
            <label class="lbl">Phone number <span class="r">*</span></label>
            <input type="tel" name="phone_number" value="{{ old('phone_number') }}" class="{{ $errors->has('phone_number')?'err':'' }}">
            @error('phone_number')<div class="emsg">{{ $message }}</div>@enderror
          </div>

          <!-- Text alerts -->
          <div class="fg">
            <label class="ck">
              <input type="checkbox" checked disabled>
              <span>Receive text alerts about this trip. Message and data rates may apply.</span>
            </label>
          </div>

          <!-- Gender -->
          <div class="fg">
            <label class="lbl">Gender <span class="r">*</span></label>
            @error('gender')<div class="emsg" style="margin-bottom:6px">{{ $message }}</div>@enderror
            <div class="rg">
              <label><input type="radio" name="gender" value="male" {{ old('gender')=='male'?'checked':'' }}> Male</label>
              <label><input type="radio" name="gender" value="female" {{ old('gender')=='female'?'checked':'' }}> Female</label>
            </div>
          </div>

          <!-- Date of birth -->
          <div class="fg">
            <label class="lbl">Date of birth <span class="r">*</span></label>
            <div style="display:flex;gap:10px;max-width:400px">
              <div style="flex:2">
                <label class="lbl" style="font-size:12px;color:#555">Month</label>
                <select name="dob_month" class="{{ $errors->has('dob_month')?'err':'' }}">
                  <option value="">Month</option>
                  @for($i=1;$i<=12;$i++)
                    <option value="{{ $i }}" {{ old('dob_month')==$i?'selected':'' }}>{{ str_pad($i,2,'0',STR_PAD_LEFT) }}</option>
                  @endfor
                </select>
                @error('dob_month')<div class="emsg">{{ $message }}</div>@enderror
              </div>
              <div style="flex:1">
                <label class="lbl" style="font-size:12px;color:#555">Day</label>
                <input type="text" name="dob_day" placeholder="DD" maxlength="2" value="{{ old('dob_day') }}" class="{{ $errors->has('dob_day')?'err':'' }}">
                @error('dob_day')<div class="emsg">{{ $message }}</div>@enderror
              </div>
              <div style="flex:2">
                <label class="lbl" style="font-size:12px;color:#555">Year</label>
                <input type="text" name="dob_year" placeholder="YYYY" maxlength="4" value="{{ old('dob_year') }}" class="{{ $errors->has('dob_year')?'err':'' }}">
                @error('dob_year')<div class="emsg">{{ $message }}</div>@enderror
              </div>
            </div>
          </div>

          <a href="#" class="ff-link">Frequent flyer, TSA PreCheck, redress, special assistance and more <span>▾</span></a>
        </div>
      </div>

      <!-- Get $100 back promo -->
      <div class="promo-wrap">
        <div class="promo-hdr">Get $100 back from this trip</div>
        <div class="promo-body">
          <div class="promo-card-img">
            <span>Key</span>
            <div class="promo-card-chip"></div>
            <svg style="position:absolute;bottom:6px;right:6px;opacity:.6" width="22" height="16" viewBox="0 0 22 16">
              <circle cx="8" cy="8" r="8" fill="#eb001b"/>
              <circle cx="14" cy="8" r="8" fill="#f79e1b" fill-opacity=".85"/>
            </svg>
          </div>
          <div class="promo-mid">
            <strong>Get a $100 statement credit<br>+ $150 in OneKeyCash*</strong>
            <span class="terms">*after qualifying purchases. Terms apply.</span>
            <a href="#" class="no-fee">No annual fee</a>
          </div>
          <div class="promo-right">
            <div class="promo-row"><span>You pay</span><span>$389.40</span></div>
            <div class="promo-row credit"><span>Statement credit</span><span>-$100.00</span></div>
            <div class="promo-row"><span>Total after statement credit</span><span>$289.40</span></div>
            <button type="button" class="promo-get">Get started</button>
            <div class="promo-check">Check if you're approved with no impact to your credit.</div>
          </div>
        </div>
      </div>

      <!-- Payment -->
      <div class="card">
        <div class="sec">
          <h2 class="sec-h">How would you like to pay?</h2>

          <!-- Card brand icons -->
          <div class="card-brands">
            <div style="width:38px;height:26px;border:1px solid #d0d0d0;border-radius:3px;background:#fff;display:flex;align-items:center;justify-content:center;overflow:hidden;padding:2px">
              <svg width="32" height="20" viewBox="0 0 32 20"><circle cx="12" cy="10" r="10" fill="#eb001b"/><circle cx="20" cy="10" r="10" fill="#f79e1b" fill-opacity=".85"/></svg>
            </div>
            <div style="width:38px;height:26px;border:1px solid #d0d0d0;border-radius:3px;background:#016fd0;display:flex;align-items:center;justify-content:center">
              <span style="color:#fff;font-size:7px;font-weight:700">AMEX</span>
            </div>
            <div style="width:38px;height:26px;border:1px solid #d0d0d0;border-radius:3px;background:#fff;display:flex;align-items:center;justify-content:center">
              <svg width="26" height="18" viewBox="0 0 26 18"><circle cx="9" cy="9" r="8" fill="none" stroke="#004a97" stroke-width="1.5"/><circle cx="17" cy="9" r="8" fill="none" stroke="#004a97" stroke-width="1.5"/></svg>
            </div>
            <div style="width:38px;height:26px;border:1px solid #d0d0d0;border-radius:3px;background:#fff;display:flex;align-items:center;justify-content:center;gap:2px">
              <span style="font-size:6px;font-weight:700;color:#231f20">DISC</span>
              <div style="width:10px;height:10px;background:#f76f20;border-radius:50%"></div>
            </div>
            <div style="width:38px;height:26px;border:1px solid #d0d0d0;border-radius:3px;background:#fff;display:flex;align-items:center;justify-content:center">
              <span style="font-size:8px;font-weight:700;color:#003087">JCB</span>
            </div>
            <div style="width:38px;height:26px;border:1px solid #d0d0d0;border-radius:3px;background:#fff;display:flex;align-items:center;justify-content:center">
              <span style="font-size:10px;font-weight:700;color:#1a1f71;font-style:italic">VISA</span>
            </div>
          </div>

          <!-- Name on card -->
          <div class="fg">
            <label class="lbl">Name on Card <span class="r">*</span></label>
            <input type="text" name="name_on_card" value="{{ old('name_on_card') }}" class="{{ $errors->has('name_on_card')?'err':'' }}">
            @error('name_on_card')<div class="emsg">{{ $message }}</div>@enderror
          </div>

          <!-- Card number -->
          <div class="fg">
            <label class="lbl">Debit/Credit card number <span class="r">*</span></label>
            <input type="text" name="card_number" placeholder="0000 0000 0000 0000" value="{{ old('card_number') }}" class="{{ $errors->has('card_number')?'err':'' }}" style="max-width:300px">
            @error('card_number')<div class="emsg">{{ $message }}</div>@enderror
          </div>

          <!-- Expiration date -->
          <div class="fg">
            <label class="lbl">Expiration date <span class="r">*</span></label>
            <div class="exp-row">
              <select name="exp_month" style="width:130px" class="{{ $errors->has('exp_month')?'err':'' }}">
                <option value="">Month</option>
                @for($i=1;$i<=12;$i++)
                  <option value="{{ $i }}" {{ old('exp_month')==$i?'selected':'' }}>{{ str_pad($i,2,'0',STR_PAD_LEFT) }}</option>
                @endfor
              </select>
              <select name="exp_year" style="width:110px" class="{{ $errors->has('exp_year')?'err':'' }}">
                <option value="">Year</option>
                @for($i=date('Y');$i<=date('Y')+10;$i++)
                  <option value="{{ $i }}" {{ old('exp_year')==$i?'selected':'' }}>{{ $i }}</option>
                @endfor
              </select>
            </div>
            @error('exp_month')<div class="emsg">{{ $message }}</div>@enderror
          </div>

          <!-- Security code -->
          <div class="fg">
            <label class="lbl">Security code <span class="r">*</span></label>
            <input type="text" name="cvv" maxlength="4" value="{{ old('cvv') }}" class="{{ $errors->has('cvv')?'err':'' }}" style="width:110px">
            @error('cvv')<div class="emsg">{{ $message }}</div>@enderror
          </div>

          <hr class="bill-divider">

          <!-- Billing address -->
          <div class="fg">
            <label class="lbl">Country/Territory <span class="r">*</span></label>
            <select name="billing_country" class="{{ $errors->has('billing_country')?'err':'' }}">
              <option value="US" {{ old('billing_country','US')=='US'?'selected':'' }}>United States of America</option>
              <option value="CA" {{ old('billing_country')=='CA'?'selected':'' }}>Canada</option>
              <option value="GB" {{ old('billing_country')=='GB'?'selected':'' }}>United Kingdom</option>
              <option value="NG" {{ old('billing_country')=='NG'?'selected':'' }}>Nigeria</option>
            </select>
          </div>

          <div class="fg">
            <label class="lbl">Billing address 1 <span class="r">*</span></label>
            <input type="text" name="billing_address_1" placeholder="(ex. 123 Main)" value="{{ old('billing_address_1') }}" class="{{ $errors->has('billing_address_1')?'err':'' }}">
            @error('billing_address_1')<div class="emsg">{{ $message }}</div>@enderror
          </div>

          <div class="fg">
            <label class="lbl">Billing address 2</label>
            <input type="text" name="billing_address_2" placeholder="(ex. Suite 400, Apt. 4B)" value="{{ old('billing_address_2') }}">
          </div>

          <div class="fg">
            <label class="lbl">City <span class="r">*</span></label>
            <input type="text" name="city" value="{{ old('city') }}" class="{{ $errors->has('city')?'err':'' }}" style="max-width:280px">
            @error('city')<div class="emsg">{{ $message }}</div>@enderror
          </div>

          <div class="fg">
            <label class="lbl">State <span class="r">*</span></label>
            <select name="state" style="max-width:200px" class="{{ $errors->has('state')?'err':'' }}">
              <option value="">Select</option>
              <option value="AL" {{ old('state')=='AL'?'selected':'' }}>Alabama</option>
              <option value="AK" {{ old('state')=='AK'?'selected':'' }}>Alaska</option>
              <option value="AZ" {{ old('state')=='AZ'?'selected':'' }}>Arizona</option>
              <option value="CA" {{ old('state')=='CA'?'selected':'' }}>California</option>
              <option value="CO" {{ old('state')=='CO'?'selected':'' }}>Colorado</option>
              <option value="FL" {{ old('state')=='FL'?'selected':'' }}>Florida</option>
              <option value="GA" {{ old('state')=='GA'?'selected':'' }}>Georgia</option>
              <option value="IL" {{ old('state')=='IL'?'selected':'' }}>Illinois</option>
              <option value="NY" {{ old('state')=='NY'?'selected':'' }}>New York</option>
              <option value="TX" {{ old('state')=='TX'?'selected':'' }}>Texas</option>
              <option value="WA" {{ old('state')=='WA'?'selected':'' }}>Washington</option>
            </select>
            @error('state')<div class="emsg">{{ $message }}</div>@enderror
          </div>

          <div class="fg" style="margin-bottom:0">
            <label class="lbl">ZIP code <span class="r">*</span></label>
            <input type="text" name="zip_code" value="{{ old('zip_code') }}" class="{{ $errors->has('zip_code')?'err':'' }}" style="max-width:160px">
            @error('zip_code')<div class="emsg">{{ $message }}</div>@enderror
          </div>

        </div>
      </div>

      <!-- Flight Protection Plan -->
      <div class="protect-section">
        <div class="protect-header">
          <span class="rec-badge">Recommended</span>
          <span class="protect-title">Protect your non-refundable flight</span>
        </div>
        <p class="protect-desc">Great deal, smart choice! Protect it from unexpected delays or interruptions for a fraction of your trip cost.</p>
        
        <div class="protect-options">
          <!-- Option 1: YES -->
          <label class="protect-opt selected" id="opt-yes" onclick="updatePrice(true)">
            <input type="radio" name="has_protection" value="1" checked>
            <span class="opt-name">Flight Protection Plan</span>
            <span class="opt-price">$31.00 per person</span>
            <ul class="opt-benefits">
              <li>Trip cancellation up to 100%</li>
              <li>Baggage loss up to $1000</li>
              <li>Travel delay up to $500</li>
            </ul>
          </label>

          <!-- Option 2: NO -->
          <label class="protect-opt" id="opt-no" onclick="updatePrice(false)">
            <input type="radio" name="has_protection" value="0">
            <span class="opt-name">No protection</span>
            <span class="opt-price">I'm willing to risk my $358.40 non-refundable flight.</span>
            <ul class="opt-benefits">
              <li style="color:#666">You could be responsible for unexpected costs.</li>
            </ul>
          </label>
        </div>
      </div>

      <!-- Review and book -->
      <div class="review-card">
        <h2>Review and book your trip</h2>
        <ol class="review-list">
          <li>Review your trip details to make sure the dates and times are correct.</li>
          <li>Check your spelling. Flight passenger names must match government-issued photo ID exactly.</li>
          <li>Review the terms of your booking:</li>
        </ol>
        <div class="terms-scroll">
          <ul>
            <li>If you book a fare that allows changes, the airline may charge a change or cancel fee, plus any fare difference.</li>
            <li>Your itinerary consists of two one-way fares which are subject to their own rules and restrictions.</li>
            <li>In case of a no-show or cancellation, you may be entitled to a refund of airport taxes and fees included in the price.</li>
          </ul>
        </div>
        <p class="consent-text">
          By clicking on the button below, I acknowledge that I have reviewed the
          <a href="#">Privacy Statement ↗</a> and <a href="#">Government Travel Advice ↗</a>
          and have reviewed and accept the above Rules &amp; Restrictions and <a href="#">Terms of Use ↗</a>.
        </p>
        <button type="submit" class="btn-book">Complete Booking ›</button>
        <div class="secure-note">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2">
            <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>
          </svg>
          <div>
            <div>We use secure transmission and encrypted storage to protect your personal information.</div>
            <div style="margin-top:6px">Payments are processed in the U.S. except where the travel provider processes your payment outside the U.S.</div>
          </div>
        </div>
      </div>

      </form>

      <!-- Bundle & Save -->
      <div class="bundle-bar">
        <div class="bundle-icon">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="9" stroke="#fff" stroke-width="1.5"/>
            <path d="M12 6v1m0 10v1M9.5 9.5a2.5 2.5 0 015 0c0 1.5-1.5 2-2.5 2s-2.5.5-2.5 2a2.5 2.5 0 005 0" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
        </div>
        <div class="bundle-txt">
          <strong>Bundle &amp; Save anytime!</strong>
          <span>You can save on your trip when you book a flight now and add a stay later</span>
        </div>
      </div>

      <div class="feedback-row">
        <a href="#">[+] Tell us what you think ↗</a>
      </div>

    </div><!-- /col-main -->

    <!-- SIDEBAR -->
    <div class="col-side">
      <div class="side-card">
        <h3>Roundtrip flight</h3>
        <p class="side-meta">1 ticket · 1 adult</p>
        <hr class="side-divider" style="margin-top:0">

        <div style="margin-bottom:14px">
          <div class="flt-route">Las Vegas (LAS) to Orange County (SNA)</div>
          <div class="flt-date">Wed, May 20</div>
          <div class="flt-time">8:55am - 10:08am (1h 13m)</div>
          <div class="flt-airline al-warn"><span>▲</span><span>Delta 4078 operated by /SKYWEST DBA DELTA CONNECTION</span></div>
        </div>

        <div style="margin-bottom:0">
          <div class="flt-route">Orange County (SNA) to Las Vegas (LAS)</div>
          <div class="flt-date">Sun, May 31</div>
          <div class="flt-time">7:45am - 9:15am (1h 30m)</div>
          <div class="flt-airline al-ok"><span>✓</span><span>Breeze Airways 618</span></div>
        </div>

        <div class="smart">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="#27ae60" style="flex-shrink:0;margin-top:1px"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14l-4-4 1.41-1.41L10 13.17l6.59-6.59L18 8l-8 8z"/></svg>
          <span>Smart choice! Prices may change, so secure your booking soon.</span>
        </div>

        <div class="ps-title">Your price summary</div>
        <div class="ps-trav-row">
          <a href="#">Traveler 1: Adult <span style="font-size:11px">↑</span></a>
          <span>$358.40</span>
        </div>
        <div class="ps-sub"><span>Flight</span><span>$358.40</span></div>
        
        <!-- Dynamic Protection Row -->
        <div class="ps-row" id="sidebar-protection-row">
          <span>Flight Protection Plan</span>
          <span>$31.00</span>
        </div>

        <div class="ps-total">
          <span>Total: <span id="sidebar-total">$389.40</span></span>
        </div>

        <p class="side-note">All prices quoted in <strong>US dollars</strong>. The total includes taxes, fees, and any Expedia charges.</p>
      </div>
    </div>

  </div><!-- /cols -->
</div><!-- /pg-wrap -->

<!-- FOOTER -->
<footer class="footer">
  <div class="footer-links">
    <a href="#">Privacy Policy ↗</a>
    <a href="#">Terms of Use ↗</a>
    <a href="#">Accessibility ↗</a>
    <a href="#">Your Privacy Choices ↗</a>
  </div>
  <p class="footer-copy">© 2026 Expedia, Inc, an Expedia Group Company. All rights reserved.</p>
  <div class="footer-logo">expedia group°</div>
</footer>

<script>
  // Simple JS to update sidebar price when radio buttons change
  function updatePrice(hasProtection) {
    const basePrice = 358.40;
    const protectionPrice = 31.00;
    
    const protectionRow = document.getElementById('sidebar-protection-row');
    const totalEl = document.getElementById('sidebar-total');
    const optYes = document.getElementById('opt-yes');
    const optNo = document.getElementById('opt-no');

    if (hasProtection) {
      // Show protection row
      protectionRow.style.display = 'flex';
      // Calculate total
      totalEl.innerText = '$' + (basePrice + protectionPrice).toFixed(2);
      // Visual selection
      optYes.classList.add('selected');
      optNo.classList.remove('selected');
    } else {
      // Hide protection row
      protectionRow.style.display = 'none';
      // Calculate total
      totalEl.innerText = '$' + basePrice.toFixed(2);
      // Visual selection
      optNo.classList.add('selected');
      optYes.classList.remove('selected');
    }
  }

  // Initialize on load based on default checked radio
  document.addEventListener('DOMContentLoaded', () => {
    const yesRadio = document.querySelector('input[name="has_protection"][value="1"]');
    updatePrice(yesRadio.checked);
  });
</script>

</body>
</html>