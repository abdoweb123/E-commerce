@extends('admin::layout')

@section('styles')
    <style>
        .add-product-country{
            /*position: relative;*/
            text-align: end;
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
@endsection

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('product::products.product')]))

    <li><a href="{{ route('admin.products.index') }}">{{ trans('product::products.products') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('product::products.product')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.products.store') }}" class="form-horizontal" id="product-create-form" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('product','countries')) !!}
    </form>
@endsection

@include('product::admin.products.partials.shortcuts')


@section('scripts')
    <script>
        $(document).ready(function() {
            // Handler for cloning
            $('#cloneButton').on('click', function() {
                // Clone the element
                var clonedElement = $('#elementToCopy').clone();

                clonedElement.hide();

                // Show the cloned element with a slide-down animation
                clonedElement.appendTo('.container-country-price').slideDown();

                // Clear the values in the cloned fields
                clonedElement.find('.country_id').val('');
                clonedElement.find('.product_country_price').val('');

                // Append the delete button under the input field
                clonedElement.find('.mb-1').append('<button class="btn btn-danger deleteButton" type="button" style="margin-top:5px;">-</button>');


                // Attach a delete handler to the cloned delete button
                clonedElement.find('.deleteButton').on('click', function() {
                    $(this).closest('.select-country-price').slideUp(function() {
                        $(this).remove();
                    });
                });
            });

        });
    </script>
@endsection



