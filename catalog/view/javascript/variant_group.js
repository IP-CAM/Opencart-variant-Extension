document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.variant-swatch').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            var targetProductId = this.getAttribute('data-product-id');
            fetch('index.php?route=extension/module/variant_group/switchVariant&target_product_id=' + targetProductId)
                .then(response => response.json())
                .then(data => {
                    if (data.redirect) {
                        // Option 1: Redirect to the new variant's product page
                        window.location.href = data.redirect;
                    } else if (data.error) {
                        alert(data.error);
                    }
                })
                .catch(error => console.error('Error switching variant:', error));
        });
    });
});
