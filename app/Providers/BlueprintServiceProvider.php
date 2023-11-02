<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class BlueprintServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blueprint::macro('deletedinfos', function () {
            $this->unsignedBigInteger('deleted_by')->nullable();
            $this->softDeletes();
        });

        Blueprint::macro('archivedInfos', function () {
            $this->unsignedBigInteger('archived_by')->nullable();
            $this->softDeletes('archived_at');
        });

        Blueprint::macro('userinfos', function () {
            $this->unsignedBigInteger('created_by')->nullable();
            $this->unsignedBigInteger('updated_by')->nullable();
        });

        

        Blueprint::macro('defaultinfos', function () {
            $this->unsignedBigInteger('created_by');
            $this->unsignedBigInteger('updated_by')->nullable();
          
        });

        Blueprint::macro('nullabledefaultinfos', function () {
            $this->unsignedBigInteger('created_by')->nullable();
            $this->unsignedBigInteger('updated_by')->nullable();
            $this->unsignedBigInteger('archived_by')->nullable();
            $this->softDeletes('archived_at');
        });
    }
}
