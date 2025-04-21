# 🧩 Variant Group Extension - OpenCart

The **Variant Group Extension - OpenCart** enhances your OpenCart store by enabling grouping of product variants (like size, color, model type) under a single master product. It provides a smoother customer experience and improves product management on the backend.

---

## 🚀 Features

- Group multiple products as variants under a master product
- Switch between variants via buttons, dropdowns, or images
- Shared SEO-friendly URL with variant switching via query parameters or AJAX
- Custom display options (color swatches, size buttons, etc.)
- Admin panel interface to link/unlink products into variant groups
- Supports different pricing, stock levels, and images per variant
- Multi-language and multi-store compatible

---

## 📦 Installation

1. Upload the `upload/` folder content to your OpenCart root directory.
2. Go to **Extensions > Installer** and install the `variant_group.ocmod.zip` if provided.
3. Navigate to **Extensions > Modules**, find **Variant Group Extension OC**, and click **Install**.
4. Configure the module from the module settings page.

---

## ⚙️ How to Use

1. Go to **Catalog > Products** in the admin panel.
2. Edit a product you want to act as a **Master Product**.
3. Under the **Variant Group** tab (added by the extension), link other existing products as its variants.
4. Configure how variants should be displayed on the product page (button, dropdown, image).
5. Save and view the product on the front-end — variant options will now appear for customer selection.

---

## 🧪 Compatibility

- OpenCart 3.x (tested on 3.0.3.8)
- Journal 3 theme support (basic integration)
- PHP 7.2 – 8.1 compatible

---

## 🛠 Configuration Options

- Display Type: Button / Dropdown / Image
- Variant Attributes: Color, Size, Model, etc.
- Master Product Behavior:
  - Show main product's details
  - Replace content dynamically on variant switch
- Optional: Auto-switch image gallery and price based on variant

---

## 📝 Changelog

### v1.0.0
- Initial release
- Admin interface for variant group management
- Front-end variant switcher (buttons & dropdowns)
- SEO support and clean URLs

---

## ❓ Troubleshooting

- **Variant group tab not showing?** Make sure the module is installed and permissions are granted under `System > Users > User Groups`.
- **Variant switching not working on front-end?** Check for JavaScript conflicts with your theme, especially if using a custom template like Journal.

---

## 📩 Support

For bug reports, feature requests, or customization inquiries, please open an issue or contact the developer directly.

---

## 📄 License

This extension is licensed under the MIT License. Feel free to use and modify for personal or commercial projects.