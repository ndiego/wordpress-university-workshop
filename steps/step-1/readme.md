# Step 1: Getting set up

## Prerequisites
You will need:
- Local WordPress development environment (`wp-env`, Local WP, MAMP, etc.)
- Code editor (VS Code, Sublime Text, etc.)

This workshop was designed using [Local WP](https://localwp.com/) and [VS Code](https://code.visualstudio.com/), but use whatever you're most comfortable with.

## Steps

### 1. Configuring the site

#### Automated setup (Local WP)

1. Create a new site in [Local WP](https://localwp.com/) by selecting the "Select an existing ZIP" option. The ZIP is available in the [/assets](/assets/content/wordpress-university.zip) folder.
2. Access the new "WordPress University" site when the creation process is complete.

#### Manual setup

1. Create a new site in [Local WP](https://localwp.com/) or your preferred local development environment. If using Local WP, name it `wordpress-university`. This will save a few steps.
2. Navigate to **Tools → Import** and click "Install Now" under the WordPress importer. Then click "Run Importer".
3. Import the demo content available in the [/assets](/assets/content/wordpressuniversity.content.xml) folder. (The media will fail to import)
4. Update the featured images for each post and page using the uploaded media. You will also need to update the images used in the content.
5. Navigate to **Media → Add New** and upload all images in the [/assets/photos](./assets/photos/) folder and the two logos in the [/assets/logos](./assets/logos/) folder. (Don't upload the screenshot)
6. Navigate to **Plugins → Add New**. Install and activate:
    * [Create Block Theme](https://wordpress.org/plugins/create-block-theme/)
    * [Gutenberg](https://wordpress.org/plugins/gutenberg/)
6. Navigate to **Settings → General**:
    * Set the Site Title to "WordPress University"
    * Set the Tagline to "Empowering Minds, Unleashing Digital Creativity"
7. Set the site icon ([provided](/assets/logos/WordPress%20University%20-%20Site%20Icon.png)) in the Customizer by going to `.../wp-admin/customize.php`.

### 2. Creating the theme
1. Navigate to **Appearance → Create Block Theme**.
4. Choose “Clone the Twenty Twenty-Three”.
5. Name the cloned theme “WP University”.
6. Provide a description such as “Empowering Minds, Unleashing Digital Creativity”.
7. Upload a screenshot ([provided](./assets/logos/WordPress%20University%20-%20Screenshot.png)).
8. Add additional theme information (optional).
9. Click “Generate”. This will download a zip file of the theme.
Navigate to **Appearance → Themes → Add New → Upload Theme**, and upload the zip. 
10. Active the new WP University theme.
