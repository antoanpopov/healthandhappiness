<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov <antoanpopoff@gmail.com>
 * Date: 11.10.2017 г.
 * Time: 17:20
 */

namespace Modules\Core\Providers;

use Collective\Html\FormFacade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\ViewErrorBag;

class  FormMacrosServiceProvider extends ServiceProvider
{

    public function boot()
    {

        FormFacade::macro('textType', function ($name, $title, ViewErrorBag $errors, $object = null, array $options = []) {
            $options = array_merge(['class' => 'form-control', 'placeholder' => $title], $options);

            $string = '<div class="form-group ' . $options['class'] . '">';
            $string .= FormFacade::label($name, $title);

            if (is_object($object)) {
                $currentData = isset($object->{$name}) ? $object->{$name} : '';
            } else {
                $currentData = null;
            }

            $string .= FormFacade::text($name, old($name, $currentData), ['class' => 'form-control']);
            if ($errors->has($name)) {
                $string .= '<label class="validation-error-label" for="' . $name . '">' . $errors->first($name) . '</label>';
            }

            $string .= '</div>';

            return $string;
        });

        FormFacade::macro('emailType', function ($name, $title, ViewErrorBag $errors, $object = null, array $options = []) {
            $options = array_merge(['class' => 'form-control', 'placeholder' => $title], $options);

            $string = '<div class="form-group ' . $options['class'] . '">';
            $string .= FormFacade::label($name, $title);

            if (is_object($object)) {
                $currentData = isset($object->{$name}) ? $object->{$name} : '';
            } else {
                $currentData = null;
            }

            $string .= FormFacade::email($name, old($name, $currentData), ['class' => 'form-control']);
            if ($errors->has($name)) {
                $string .= '<label class="validation-error-label" for="' . $name . '">' . $errors->first($name) . '</label>';
            }

            $string .= '</div>';

            return $string;
        });


        FormFacade::macro('languageSelect', function ($name, $title, ViewErrorBag $errors, $objectLanguages = null, $options) {

            $macro = '<div class="form-group ' . $options['class'] . '">';
            $macro .= '<label for="' . $name . '">' . $title . '</label>';
            $macro .= '<select id="' . $name . '" name="' . $name . '[]" multiple="multiple" data-placeholder="' . $title . '" class="select-images">';


            foreach (\Modules\Dashboard\Entities\Language::all() as $language) {

                $isSelected = false;
                foreach ($objectLanguages as $objectLanguage) {
                    if ($language->id == $objectLanguage->id) {
                        $isSelected = true;
                    }
                }

                $selected = ($isSelected) ? 'selected="selected"' : '';
                $macro .= '<option value="' . $language->id . '" data-image="' . asset('/images/flags/' . $language->flag) . '" ' . $selected . '>' . $language->name . '</option>';
            }

            $macro .= '</select>';
            $macro .= '</div>';


            return $macro;
        });
    }
}
