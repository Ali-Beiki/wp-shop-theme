<script>
jQuery(document).ready(function ($) {
    let frame;

    $('#add-gallery-images').on('click', function (e) {
        e.preventDefault();

        if (frame) {
            frame.open();
            return;
        }

        frame = wp.media({
            title: 'انتخاب یا آپلود تصاویر',
            button: { text: 'افزودن' },
            multiple: true, // select mony 
            library: { type: 'image' }, //type 
            frame: 'select'
        });

        // when you select the image
        frame.on('select', function () {
            let selection = frame.state().get('selection');

            // loop on selected image
            selection.each(function (attachment) {
                let id = attachment.id;
                let url = attachment.attributes.sizes.thumbnail.url;

                // already added ?
                if ($('#gallery-images li[data-id="' + id + '"]').length) return;

                // add image in metabox
                $('#gallery-images').append(
                    `<li data-id="${id}">
                        <img src="${url}" />
                        <button class="remove-image-button" type="button">❌</button>
                    </li>`
                );

                // update hidden field
                updateInput();
            });
        });

        frame.open();
    });

    $('#gallery-container').on('click', '.remove-image-button', function () {
        $(this).closest('li').remove();
        updateInput();
    });

    function updateInput() {
        let ids = [];
        $('#gallery-images li').each(function () {
            ids.push($(this).data('id')); // pusg all data-id li elemnt
        });
        $('#gallery-images-input').val(ids.join(',')); // set value in hidden input
    }
});
</script>

<div id="gallery-container">
    <ul id="gallery-images">
        <?php foreach ($slider_image as $image_id): 
            $img_url = wp_get_attachment_image_url($image_id, 'thumbnail'); # عکس از روی ایدی پست در  url گرفتن  
        ?>
        <li data-id="<?php echo esc_attr($image_id); ?>">
            <img src="<?php echo esc_url($img_url); ?>" />
            <button class="remove-image-button" type="button">❌</button>
        </li>
        <?php endforeach; ?>
    </ul>
    <input type="hidden" 
           name="<?php echo Product::PRODUCT_SLIDER_IMAGE_META_KEY; ?>" 
           id="gallery-images-input" 
           value="<?php echo esc_attr(implode(',', $slider_image)); ?>">
    <button type="button" class="button" id="add-gallery-images">افزودن تصاویر</button>
</div>
