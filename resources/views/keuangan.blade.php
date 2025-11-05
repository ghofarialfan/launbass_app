<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-[#ECF6F6] text-slate-800 min-h-screen">
    <div class="mx-auto max-w-[420px] px-4 pt-6 pb-20">
        <!-- AppBar -->
        <div class="bg-white shadow rounded-2xl px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="text-xs text-slate-400">9:41</span>
            </div>
            <h1 class="font-semibold text-base">Keuangan</h1>
            <div class="w-6"></div>
        </div>

        <!-- Actions -->
        <div class="mt-4 space-y-3">
            <a href="#" class="block w-full rounded-full bg-[#133F47] text-white text-sm font-medium px-5 py-3 shadow">
                Grafik Keuangan
            </a>
            <a href="#" class="block w-full rounded-full bg-[#133F47] text-white text-sm font-medium px-5 py-3 shadow">
                Aliran Kas
            </a>
        </div>

        <!-- History -->
        <section class="mt-6">
            <div class="flex items-center justify-between mb-2">
                <h2 class="font-semibold">Riwayat Keuangan</h2>
                <div class="relative">
                    <select class="appearance-none text-xs bg-white border border-slate-200 rounded-full px-3 py-1 pr-7 shadow focus:outline-none">
                        <option>Filter</option>
                        <option>Semua</option>
                        <option>Pemasukan</option>
                        <option>Pengeluaran</option>
                    </select>
                </div>
            </div>

            <div class="space-y-3">
                <!-- Item -->
                <div class="bg-white rounded-xl px-3 py-3 shadow flex items-start justify-between">
                    <div>
                        <div class="text-xs font-medium text-slate-700">ORD1443</div>
                        <div class="text-sm text-emerald-600 font-semibold">Rp 50.000</div>
                    </div>
                    <div class="text-right">
                        <div class="text-[11px] text-slate-500 mb-1">18/06/2025</div>
                        <a href="#" class="text-[11px] bg-slate-800 text-white px-3 py-1 rounded-md">Detail</a>
                    </div>
                </div>

                <div class="bg-white rounded-xl px-3 py-3 shadow flex items-start justify-between">
                    <div>
                        <div class="text-xs font-medium text-slate-700">ORD1442</div>
                        <div class="text-sm text-emerald-600 font-semibold">Rp 30.000</div>
                    </div>
                    <div class="text-right">
                        <div class="text-[11px] text-slate-500 mb-1">18/06/2025</div>
                        <a href="#" class="text-[11px] bg-slate-800 text-white px-3 py-1 rounded-md">Detail</a>
                    </div>
                </div>

                <div class="bg-white rounded-xl px-3 py-3 shadow flex items-start justify-between">
                    <div>
                        <div class="text-xs font-medium text-slate-700">SPD102</div>
                        <div class="text-sm text-red-600 font-semibold">Rp 200.000</div>
                    </div>
                    <div class="text-right">
                        <div class="text-[11px] text-slate-500 mb-1">18/06/2025</div>
                        <a href="#" class="text-[11px] bg-slate-800 text-white px-3 py-1 rounded-md">Detail</a>
                    </div>
                </div>

                <div class="bg-white rounded-xl px-3 py-3 shadow flex items-start justify-between">
                    <div>
                        <div class="text-xs font-medium text-slate-700">ORD1441</div>
                        <div class="text-sm text-emerald-600 font-semibold">Rp 70.000</div>
                    </div>
                    <div class="text-right">
                        <div class="text-[11px] text-slate-500 mb-1">18/06/2025</div>
                        <a href="#" class="text-[11px] bg-slate-800 text-white px-3 py-1 rounded-md">Detail</a>
                    </div>
                </div>

                <div class="bg-white rounded-xl px-3 py-3 shadow flex items-start justify-between">
                    <div>
                        <div class="text-xs font-medium text-slate-700">ORD1440</div>
                        <div class="text-sm text-emerald-600 font-semibold">Rp 50.000</div>
                    </div>
                    <div class="text-right">
                        <div class="text-[11px] text-slate-500 mb-1">18/06/2025</div>
                        <a href="#" class="text-[11px] bg-slate-800 text-white px-3 py-1 rounded-md">Detail</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 right-0">
        <div class="mx-auto max-w-[420px] px-4">
            <div class="bg-[#133F47] text-white rounded-t-2xl h-16 flex items-center justify-around">
                <a href="#" class="flex flex-col items-center text-xs opacity-80">
                    <span>🏠</span>
                </a>
                <a href="#" class="flex flex-col items-center text-xs opacity-80">
                    <span>🧺</span>
                </a>
                <a href="#" class="flex flex-col items-center text-xs">
                    <div class="bg-white text-[#133F47] rounded-full w-10 h-10 flex items-center justify-center -mt-6 shadow">📊</div>
                </a>
                <a href="#" class="flex flex-col items-center text-xs opacity-80">
                    <span>👤</span>
                </a>
            </div>
        </div>
    </nav>
</body>
</html>