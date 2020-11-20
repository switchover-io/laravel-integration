<?php 

namespace SwitchoverLaravel;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

class CustomBladeDirectives 
{

    /**
     * Registers custom switchover blade directives
     *
     * @return void
     */
    public function register() {


        Blade::directive('hasFeature', function ($expression) {
            return "<?php if (app('switchover')->toggleValue({$expression}, false)) : ?>";
        });

    
        Blade::directive('hasConditionalFeature', function ($expression) {

            $args = collect(explode(',', $expression))->map(function ($item) {
                return trim($item);
            });

            $name = $args->get(0);
            $context = join(', ', $args->slice(1)->toArray());
            
            return "<?php if (app('switchover')->toggleValue({$name}, new Context({$context}), false)) : ?>";
        });

        Blade::directive('endHasFeature', function () {
            return "<?php endif; ?>";
        });


    }

}