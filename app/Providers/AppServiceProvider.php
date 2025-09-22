<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Surat;
use App\Models\Dispo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (session()->has('nama_instansi')) {
                $namaAktif = session('nama_instansi');
                $totalDisampaikan = Surat::where('tujuan_surat', $namaAktif)
                    ->where('status_surat', 'Disampaikan')
                    ->count();
                    
                $totalProses = Dispo::where('tujuan_dispo', $namaAktif)
                    ->where('status_dispo', 'Diproses')
                    ->count();
            } else {
                $totalDisampaikan = 0;
                $totalProses = 0;
            }

            $view->with('totalDisampaikan', $totalDisampaikan);
            $view->with('totalProses', $totalProses);
        });
    }
}
