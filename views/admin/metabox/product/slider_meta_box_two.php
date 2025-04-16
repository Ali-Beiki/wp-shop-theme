<script>
    jQuery(document).ready(function($){
        $('.add_slider_item').on('click',function (event){
            let wrapper =$('.slider_item_wrapper')
            let item = 
            `
                <p>
                    <input type="text" name="<?php echo Product::PRODUCT_SLIDER_IMAGE_META_KEY ?>[]" value="<?php var_dump($slider_image)  ?>">
                     <a class='remove_slider_item' href="#"><span class="dashicons dashicons-no-alt"></span></a>
                </p>
                `
            wrapper.append(item)
        })
        $(document).on('click','.remove_slider_item',function(event){
            let this_item =$(this); // get item
            this_item.parent().remove()
        })
    });


</script>
<p>
    <!-- <input type="text" name="<?php echo Product::PRODUCT_SLIDER_IMAGE_META_KEY ?>" value="<?php var_dump($slider_image)  ?>"> -->
     <a href="#" class="add_slider_item" > اضافه کردن ایتم </a>
</p>

<div class="slider_item_wrapper">

</div>