{{ Form::text('name', trans('product::attributes.name'), $errors, $product, ['labelCol' => 2, 'required' => true]) }}
{{ Form::wysiwyg('description', trans('product::attributes.description'), $errors, $product, ['labelCol' => 2, 'required' => true]) }}

<div class="row">
    <div class="col-md-8">

        <div class="container-country-price">
            <div class="select-country-price" id="elementToCopy">
                <!-- Choose Country -->
                <div class="form-group">
                    <label for="country_id" class="col-md-3 control-label text-left">Country</label>
                    <div class="col-md-9">
                        <select name="country_id[]" class="form-control custom-select-black" id="country_id">
                            <option value="">Please Select</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Enter Price For this country -->
                <div class="form-group">
                    <label for="product_country_price[]" class="col-md-3 control-label text-left">Country Price</label>
                    <div class="col-md-9 mb-1">
                        <input name="product_country_price[]" type="number" step="any" class="product_country_price form-control">
                    </div>
                </div>

            </div>
        </div>
        <div class="add-product-country">
            <button id="cloneButton" class="btn btn-primary" type="button" style="margin-top:5px">+</button>
        </div>


        {{ Form::select('brand_id', trans('product::attributes.brand_id'), $errors, $brands, $product) }}
        {{ Form::select('categories', trans('product::attributes.categories'), $errors, $categories, $product, ['class' => 'selectize prevent-creation', 'multiple' => true]) }}
        {{ Form::select('tax_class_id', trans('product::attributes.tax_class_id'), $errors, $taxClasses, $product) }}
        {{ Form::select('tags', trans('product::attributes.tags'), $errors, $tags, $product, ['class' => 'selectize prevent-creation', 'multiple' => true]) }}
        {{ Form::checkbox('is_virtual', trans('product::attributes.is_virtual'), trans('product::products.form.the_product_won\'t_be_shipped'), $errors, $product) }}
        {{ Form::checkbox('is_active', trans('product::attributes.is_active'), trans('product::products.form.enable_the_product'), $errors, $product, ['checked' => true]) }}
    </div>
</div>
