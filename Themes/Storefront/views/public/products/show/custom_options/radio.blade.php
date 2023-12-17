<div class="form-group variant-radio">
    <div class="">
        <div class="">
            <label>
                {!!
                    $option->name .
                    ($option->is_required ? '<span>*</span>' : '<span>:</span>')
                !!}
            </label>
        </div>

                <div class="row">
                    @foreach ($option->values as $value)
                        <div class="form-radio form-radio-prices" onclick="changeBackgroundColor(this,{{$option->id}})">
                            <input
                                type="radio"
                                name="options[{{ $option->id }}]"
                                value="{{ $value->id }}"
                                id="option-{{ $option->id }}-value-{{ $value->id }}"
                                v-model="cartItemForm.options[{{ $option->id }}]"
                            >

                            <div class="form-label">
                                <label class="label-description" for="option-{{ $option->id }}-value-{{ $value->id }}">
                                    {!!
                                        $value->label .
                                        $value->formattedPriceForProduct($product)
                                    !!}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <span
                        class="error-message"
                        v-if="errors.has('{{ "options.{$option->id}" }}')"
                        v-text="errors.get('{{ "options.{$option->id}" }}')"
                    >
                </div>










{{--        <div class="col-xl-10 col-lg-12">--}}
{{--            @foreach ($option->values as $value)--}}
{{--                <div class="row">--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="checkbox-z">--}}
{{--                            <button type="radio" name="options[{{ $option->id }}][]"--}}
{{--                                   id="option-{{ $option->id }}-value-{{ $value->id }}"--}}
{{--                                   value="{{ $value->id }}"--}}
{{--                                   @change="updateCheckboxTypeOptionValue({{ $option->id }}, $event)"--}}
{{--                            >--}}
{{--                                {!!--}}
{{--                                    $value->label .--}}
{{--                                    $value->formattedPriceForProduct($product)--}}
{{--                                !!}--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}

{{--            <span--}}
{{--                class="error-message"--}}
{{--                v-if="errors.has('{{ "options.{$option->id}" }}')"--}}
{{--                v-text="errors.get('{{ "options.{$option->id}" }}')"--}}
{{--            >--}}
{{--        </div>--}}

    </div>
</div>









