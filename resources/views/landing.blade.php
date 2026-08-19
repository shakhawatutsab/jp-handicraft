<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>জামালপুরের হস্তশিল্প থ্রি-পিস | খাঁটি হাতে সেলাই কালেকশন</title>
    <meta name="description"
        content="জামালপুরের কারিগরদের হাতে সেলাই করা প্রিমিয়াম সুতি থ্রি-পিস। ক্যাশ অন ডেলিভারি, সারা বাংলাদেশে হোম ডেলিভারি ও পণ্য দেখে নেওয়ার সুযোগ।">
    <meta property="og:type" content="website">
    <meta property="og:title" content="জামালপুরের হস্তশিল্প থ্রি-পিস কালেকশন">
    <meta property="og:description"
        content="১০০% হাতে সেলাই করা প্রিমিয়াম সুতি থ্রি-পিস, ক্যাশ অন ডেলিভারিতে সারা দেশে।">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Hind Siliguri"', 'system-ui', 'sans-serif']
                    },
                    colors: {
                        brand: '#047857',
                        'brand-deep': '#064E3B',
                        mint: '#ECFDF5',
                        gold: '#D4A017',
                        ink: '#0F241D',
                        muted: '#5C7269',
                    },
                    boxShadow: {
                        card: '0 10px 30px -14px rgba(6,78,59,.45)'
                    },
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth
        }

        body {
            font-family: "Hind Siliguri", system-ui, sans-serif
        }
    </style>
</head>

<body class="bg-[#FAFAF7] text-ink">

    {{-- Hero --}}
    <header class="relative overflow-hidden bg-brand-deep">
        <img src="{{ asset('images/hero.jpg') }}" alt="জামালপুরের কারিগর হাতে সেলাই করছেন"
            class="absolute inset-0 h-full w-full object-cover opacity-30">
        <div class="relative mx-auto max-w-5xl px-5 pb-14 pt-12 text-center sm:pt-16">
            <span class="inline-block rounded-full bg-mint/15 px-4 py-1 text-sm font-medium text-mint">সরাসরি জামালপুর
                থেকে</span>
            <h1 class="mt-4 text-3xl font-bold leading-snug text-white sm:text-5xl">জামালপুরের খাঁটি হস্তশিল্পের
                আকর্ষণীয় থ্রি-পিস কালেকশন</h1>
            <p class="mx-auto mt-4 max-w-2xl text-base leading-relaxed text-mint/90 sm:text-lg">১০০% হাতে সেলাই করা,
                প্রিমিয়াম সুতি কাপড় এবং নান্দনিক কারুকাজ।</p>
            <ul class="mx-auto mt-7 grid max-w-2xl gap-3 sm:grid-cols-3">
                @foreach (['ক্যাশ অন ডেলিভারি', 'সারা বাংলাদেশে হোম ডেলিভারি', 'পণ্য দেখে নেওয়ার সুযোগ'] as $usp)
                    <li class="rounded-xl bg-white/10 px-3 py-3 text-sm font-medium text-white backdrop-blur-sm">
                        {{ $usp }}</li>
                @endforeach
            </ul>
            <a href="#order"
                class="mt-8 inline-flex rounded-full bg-gold px-8 py-4 text-base font-bold text-brand-deep shadow-card transition-transform hover:scale-105">অর্ডার
                করতে নিচে যান</a>
        </div>
    </header>

    @php
        $old = old('product_id', $products[0]['id']);
        $oldArea = old('area', 'inside');
    @endphp

    <form id="orderForm" method="POST" action="{{ route('order.store') }}" novalidate>
        @csrf

        {{-- Products --}}
        <section class="mx-auto max-w-6xl px-5 py-14">
            <h2 class="text-center text-2xl font-bold sm:text-3xl">আমাদের কালেকশন</h2>
            <p class="mt-2 text-center text-muted">পছন্দের থ্রি-পিসটি সিলেক্ট করুন, নিচের ফর্মে অর্ডার কনফার্ম করুন।</p>

            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($products as $p)
                    <label data-card data-id="{{ $p['id'] }}" data-price="{{ $p['offer'] }}"
                        data-title="{{ $p['title'] }}"
                        class="group flex cursor-pointer flex-col overflow-hidden rounded-2xl border-2 bg-white text-left transition-all
                      {{ $old === $p['id'] ? 'border-brand shadow-card' : 'border-black/10 hover:border-brand/40 hover:shadow-card' }}">
                        <input type="radio" name="product_id" value="{{ $p['id'] }}" class="sr-only"
                            @checked($old === $p['id'])>
                        <div class="relative aspect-[4/5] overflow-hidden bg-mint">
                            <img src="{{ asset('images/' . $p['image']) }}" alt="{{ $p['title'] }}" loading="lazy"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <span
                                class="absolute left-3 top-3 rounded-full bg-gold px-3 py-1 text-xs font-bold text-brand-deep">২০%
                                ছাড়</span>
                        </div>
                        <div class="flex flex-1 flex-col p-4">
                            <h3 class="text-base font-semibold leading-snug">{{ $p['title'] }}</h3>
                            <div class="mt-2 flex items-baseline gap-2">
                                <span class="text-xl font-bold text-brand">৳{{ bn($p['offer']) }}</span>
                                <span class="text-sm text-muted line-through">৳{{ bn($p['regular']) }}</span>
                            </div>
                            <ul class="mt-3 space-y-1.5 text-sm text-muted">
                                @foreach ($p['features'] as $f)
                                    <li class="flex gap-2"><span
                                            class="text-brand">✓</span><span>{{ $f }}</span></li>
                                @endforeach
                            </ul>
                            <span data-pick
                                class="mt-4 block rounded-xl px-4 py-2.5 text-center text-sm font-bold
                  {{ $old === $p['id'] ? 'bg-brand text-white' : 'bg-mint text-brand-deep' }}">
                                {{ $old === $p['id'] ? 'নির্বাচিত' : 'পছন্দ করুন' }}
                            </span>
                        </div>
                    </label>
                @endforeach
            </div>
        </section>

        {{-- Why us --}}
        <section class="bg-mint py-14">
            <div class="mx-auto max-w-5xl px-5">
                <h2 class="text-center text-2xl font-bold sm:text-3xl">কেন আমাদের থ্রি-পিস নেবেন?</h2>
                <div class="mt-8 grid gap-5 sm:grid-cols-3">
                    @foreach ([['জামালপুরের নিজস্ব কারিগর দ্বারা তৈরি', 'প্রতিটি থ্রি-পিস আমাদের নিজস্ব কারিগরদের হাতে যত্ন করে সেলাই করা।'], ['১০০% রং ও কাপড়ের গ্যারান্টি', 'রং উঠবে না, কাপড় সংকুচিত হবে না — না মিললে বদলে দেওয়া হবে।'], ['কুরিয়ারে পণ্য দেখে টাকা দেওয়ার সুবিধা', 'পণ্য হাতে পেয়ে, দেখে নিশ্চিত হয়ে তারপর মূল্য পরিশোধ করুন।']] as [$t, $d])
                        <div class="rounded-2xl bg-white p-6 shadow-card">
                            <h3 class="text-lg font-semibold leading-snug">{{ $t }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-muted">{{ $d }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Order form --}}
        <section id="order" class="mx-auto max-w-3xl scroll-mt-6 px-5 py-14">
            <h2 class="text-center text-2xl font-bold sm:text-3xl">সহজ অর্ডার ফর্ম</h2>
            <p class="mt-2 text-center text-muted">অর্ডার কনফার্ম করতে নিচের ফর্মটি পূরণ করুন</p>

            <div class="mt-8 space-y-5 rounded-2xl border border-black/10 bg-white p-5 shadow-card sm:p-7">
                <div>
                    <label class="mb-2 block text-sm font-semibold" for="name">নাম</label>
                    <input id="name" name="name" value="{{ old('name') }}" maxlength="100"
                        placeholder="আপনার সম্পূর্ণ নাম"
                        class="w-full rounded-xl border border-black/15 px-4 py-3 outline-none focus:border-brand focus:ring-2 focus:ring-brand/30">
                    <p data-err="name" class="mt-1.5 text-sm text-red-600">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold" for="phone">মোবাইল নম্বর</label>
                    <input id="phone" name="phone" inputmode="numeric" maxlength="11" value="{{ old('phone') }}"
                        placeholder="01XXXXXXXXX"
                        class="w-full rounded-xl border border-black/15 px-4 py-3 outline-none focus:border-brand focus:ring-2 focus:ring-brand/30">
                    <p data-err="phone" class="mt-1.5 text-sm text-red-600">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold" for="address">সম্পূর্ণ ঠিকানা (থানা ও
                        জেলাসহ)</label>
                    <textarea id="address" name="address" rows="3" maxlength="400" placeholder="গ্রাম/বাসা, রোড, থানা, জেলা"
                        class="w-full resize-none rounded-xl border border-black/15 px-4 py-3 outline-none focus:border-brand focus:ring-2 focus:ring-brand/30">{{ old('address') }}</textarea>
                    <p data-err="address" class="mt-1.5 text-sm text-red-600">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div>
                    <p class="mb-2 text-sm font-semibold">ডেলিভারি এলাকা</p>
                    <div class="grid gap-3 sm:grid-cols-2">
                        @foreach ([['inside', 'ঢাকার ভেতরে', 80], ['outside', 'ঢাকার বাইরে', 150]] as [$k, $l, $fee])
                            <label data-area
                                class="flex cursor-pointer items-center gap-3 rounded-xl border-2 px-4 py-3
                   {{ $oldArea === $k ? 'border-brand bg-mint' : 'border-black/10 bg-white' }}">
                                <input type="radio" name="area" value="{{ $k }}"
                                    data-fee="{{ $fee }}" class="accent-[#047857]"
                                    @checked($oldArea === $k)>
                                <span class="text-sm font-medium">{{ $l }} (৳{{ bn($fee) }})</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="rounded-2xl bg-mint p-5">
                    <h3 class="text-base font-bold">অর্ডার সামারি</h3>
                    <dl class="mt-3 space-y-2 text-sm">
                        <div class="flex justify-between gap-4">
                            <dt id="sumTitle" class="text-muted"></dt>
                            <dd id="sumPrice" class="font-semibold"></dd>
                        </div>
                        <div class="flex justify-between gap-4">
                            <dt class="text-muted">ডেলিভারি চার্জ</dt>
                            <dd id="sumFee" class="font-semibold"></dd>
                        </div>
                        <div class="flex justify-between gap-4 border-t border-brand/20 pt-3 text-base">
                            <dt class="font-bold">সর্বমোট</dt>
                            <dd id="sumTotal" class="font-bold text-brand"></dd>
                        </div>
                    </dl>
                </div>

                <div class="flex items-center gap-3 rounded-xl border-2 border-brand px-4 py-3">
                    <span class="text-brand">✔</span>
                    <span class="text-sm font-medium">ক্যাশ অন ডেলিভারি (পণ্য হাতে পেয়ে টাকা দিন)</span>
                </div>

                <button type="submit"
                    class="w-full rounded-xl bg-brand px-6 py-4 text-lg font-bold text-white shadow-card transition-colors hover:bg-brand-deep">
                    অর্ডার কনফার্ম করুন
                </button>
            </div>
        </section>
    </form>

    {{-- Footer --}}
    <footer class="bg-brand-deep py-12 text-white">
        <div class="mx-auto max-w-3xl px-5 text-center">
            <h2 class="text-xl font-bold">জামালপুর হস্তশিল্প</h2>
            <div class="mt-5 flex flex-wrap justify-center gap-3">
                <a href="tel:{{ config('shop.phone') }}"
                    class="rounded-full bg-white/10 px-5 py-3 text-sm font-semibold">📞
                    {{ bn(config('shop.phone_display')) }}</a>
                <a href="https://wa.me/01701140154{{ config('shop.whatsapp') }}" target="_blank" rel="noopener"
                    class="rounded-full bg-gold px-5 py-3 text-sm font-bold text-brand-deep">হোয়াটসঅ্যাপে অর্ডার</a>
                <a href="{{ config('shop.facebook') }}" target="_blank" rel="noopener"
                    class="rounded-full bg-white/10 px-5 py-3 text-sm font-semibold">ফেসবুক পেজ</a>
            </div>
            <p class="mx-auto mt-6 max-w-xl text-sm leading-relaxed text-mint/80">
                শর্তাবলী ও রিফান্ড নীতি: পণ্য হাতে পাওয়ার সময় কুরিয়ারের সামনে দেখে নিতে পারবেন। পণ্যে কোনো ত্রুটি
                থাকলে ৩ দিনের মধ্যে জানালে বিনামূল্যে পরিবর্তন করে দেওয়া হবে। ব্যবহৃত বা ধোয়া পণ্য পরিবর্তনযোগ্য নয়।
                ডেলিভারি চার্জ অফেরতযোগ্য।
            </p>
            <p class="mt-6 text-xs text-mint/60">© {{ bn(date('Y')) }} জামালপুর হস্তশিল্প। সর্বস্বত্ব সংরক্ষিত।</p>
        </div>
    </footer>

    {{-- Confirmation modal --}}
    <div id="modal" class="fixed inset-0 z-50 hidden items-end justify-center bg-black/50 p-4 sm:items-center">
        <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-card">
            <h3 class="text-lg font-bold">ধন্যবাদ!</h3>
            <p class="mt-1 text-sm leading-relaxed text-muted">আপনার অর্ডারটি গ্রহণ করা হয়েছে। দ্রুতই আমাদের প্রতিনিধি
                কল করবেন।</p>
            <dl class="mt-5 space-y-2 rounded-xl bg-mint p-4 text-sm">
                @if (session('order'))
                    @php $o = session('order'); @endphp
                    <div class="flex justify-between gap-4">
                        <dt class="text-muted">অর্ডার নং</dt>
                        <dd class="font-medium">{{ bn($o['id']) }}</dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt class="text-muted">নাম</dt>
                        <dd class="font-medium">{{ $o['name'] }}</dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt class="text-muted">মোবাইল</dt>
                        <dd class="font-medium">{{ bn($o['phone']) }}</dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt class="text-muted">ঠিকানা</dt>
                        <dd class="text-right font-medium">{{ $o['address'] }}</dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt class="text-muted">পণ্য</dt>
                        <dd class="text-right font-medium">{{ $o['product_title'] }}</dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt class="text-muted">ডেলিভারি</dt>
                        <dd class="font-medium">৳{{ bn($o['delivery_fee']) }}</dd>
                    </div>
                    <div class="flex justify-between gap-4 border-t border-brand/20 pt-2 font-bold">
                        <dt>সর্বমোট</dt>
                        <dd class="text-brand">৳{{ bn($o['total']) }}</dd>
                    </div>
                @endif
            </dl>
            <button type="button"
                onclick="document.getElementById('modal').classList.add('hidden');document.getElementById('modal').classList.remove('flex')"
                class="mt-5 w-full rounded-xl bg-brand px-6 py-3 font-bold text-white hover:bg-brand-deep">ঠিক
                আছে</button>
        </div>
    </div>

    <script>
        const bn = v => String(v).replace(/[0-9]/g, d => '০১২৩৪৫৬৭৮৯' [d]);
        const cards = [...document.querySelectorAll('[data-card]')];
        const areas = [...document.querySelectorAll('[data-area]')];

        function selectedCard() {
            return cards.find(c => c.querySelector('input').checked) || cards[0];
        }

        function fee() {
            const a = document.querySelector('input[name=area]:checked');
            return a ? +a.dataset.fee : 80;
        }

        function render() {
            cards.forEach(c => {
                const on = c.querySelector('input').checked;
                c.classList.toggle('border-brand', on);
                c.classList.toggle('shadow-card', on);
                c.classList.toggle('border-black/10', !on);
                const pick = c.querySelector('[data-pick]');
                pick.className = 'mt-4 block rounded-xl px-4 py-2.5 text-center text-sm font-bold ' + (on ?
                    'bg-brand text-white' : 'bg-mint text-brand-deep');
                pick.textContent = on ? 'নির্বাচিত' : 'পছন্দ করুন';
            });
            areas.forEach(a => {
                const on = a.querySelector('input').checked;
                a.classList.toggle('border-brand', on);
                a.classList.toggle('bg-mint', on);
                a.classList.toggle('border-black/10', !on);
            });
            const c = selectedCard(),
                price = +c.dataset.price,
                f = fee();
            sumTitle.textContent = c.dataset.title;
            sumPrice.textContent = '৳' + bn(price);
            sumFee.textContent = '৳' + bn(f);
            sumTotal.textContent = '৳' + bn(price + f);
        }
        document.addEventListener('change', render);
        render();

        // client-side validation (server re-validates too)
        const form = document.getElementById('orderForm');
        const setErr = (n, m) => document.querySelector(`[data-err="${n}"]`).textContent = m || '';
        form.addEventListener('submit', e => {
            const name = form.name.value.trim(),
                phone = form.phone.value.trim(),
                address = form.address.value.trim();
            let ok = true;
            setErr('name', name.length < 3 ? (ok = false, 'সম্পূর্ণ নাম লিখুন') : '');
            setErr('phone', !/^01[3-9]\d{8}$/.test(phone) ? (ok = false,
                '১১ ডিজিটের সঠিক মোবাইল নম্বর লিখুন (যেমন: ০১৭xxxxxxxx)') : '');
            setErr('address', address.length < 10 ? (ok = false, 'থানা ও জেলাসহ সম্পূর্ণ ঠিকানা লিখুন') : '');
            if (!ok) {
                e.preventDefault();
                document.getElementById('order').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
        form.phone.addEventListener('input', e => e.target.value = e.target.value.replace(/\D/g, '').slice(0, 11));

        @if (session('order'))
            const m = document.getElementById('modal');
            m.classList.remove('hidden');
            m.classList.add('flex');
        @endif
        @if ($errors->any())
            document.getElementById('order').scrollIntoView();
        @endif
    </script>
</body>

</html>
