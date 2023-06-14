<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->register();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        collect($this->directives())->each(function ($item, $key) {
            Blade::directive($key, $item);
        });

        Blade::if('lampiran', function ($lampiran,$nama) {
            return (isset($lampiran->nama)) ? strtolower($lampiran->nama) ==  strtolower($nama)  : false;
        });
        

    }

    public function directives()
    {
        return [
            /*
            |---------------------------------------------------------------------
            | @routeis
            |---------------------------------------------------------------------
            */

            'routeis' => function ($expression) {
                return "<?php if (fnmatch({$expression}, Route::currentRouteName())) : ?>";
            },

            'endrouteis' => function ($expression) {
                return '<?php endif; ?>';
            },

            'routeisnot' => function ($expression) {
                return "<?php if (! fnmatch({$expression}, Route::currentRouteName())) : ?>";
            },

            'endrouteisnot' => function ($expression) {
                return '<?php endif; ?>';
            },

            /*
            |---------------------------------------------------------------------
            | @dump, @dd
            |---------------------------------------------------------------------
            */

            'dump' => function ($expression) {
                return "<?php dump({$expression}); ?>";
            },

            'dd' => function ($expression) {
                return "<?php dd({$expression}); ?>";
            },

            /*
            |---------------------------------------------------------------------
            | @haserror
            |---------------------------------------------------------------------
            */

            'haserror' => function ($expression) {

                return implode(' ',[
                    '<?php if(isset($errors) && $errors->has('.$expression.')) { ?>',
                    '<span class="invalid-feedback"><strong>',
                    '<?php echo ucwords($errors->first('.$expression.')); ?>',
                    '</strong></span>',
                    '<?php } ?>',
                ]);
            },


        ];
    }
}
