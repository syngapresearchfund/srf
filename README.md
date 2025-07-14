# SRF WordPress Theme

Custom theme design for the SRF site.

## Podcast Platform Badges Management

### How to Add Podcast Platform Badges

The theme now supports dynamic podcast platform badges that can be managed through the WordPress admin interface. Here's how to set them up:

1. **Access Podcast Categories**: Go to **Podcasts > Categories** in your WordPress admin
2. **Edit a Category**: Click on any podcast category (e.g., "SYNGAP10", "SYNGAP1 Stories", "Café SYNGAP1")
3. **Add Platform Information**: You'll see the following fields:
   - **Podcast Image**: Upload the podcast cover image
   - **Podcast Description**: Add a description of the podcast
   - **Platform 1-5**: Dropdown menus to select platforms (Apple Podcasts, Spotify, Amazon Music, etc.)
   - **Platform 1-5 Link**: URL fields for each platform's link
   - **Rating Message**: Add a message encouraging ratings

4. **Add Platforms**: Select platforms from the dropdowns and add their URLs (up to 5 platforms)
5. **Save**: Click "Update" to save your changes

### Platform Badge Requirements

- **Recommended Size**: 200x60 pixels (or similar aspect ratio)
- **Format**: PNG or SVG preferred for transparency
- **Quality**: High resolution for crisp display

### Available Platform Badges

The theme includes pre-made badges for common platforms in `assets/images/`:
- `Podcast-Apple-Badge.png`
- `Podcast-Spotify-Badge.png`
- `Podcast-Amazon-Badge.png`
- `Podcast-Google-Badge.png`
- `Podcast-YouTube-Badge.png`
- `Podcast-HPN-Badge.png`
- `Podcast-iHeart-Badge.png`

### Example Setup

For a typical podcast category, you might add:
1. **Apple Podcasts** - Link to Apple Podcasts + Apple badge
2. **Spotify** - Link to Spotify + Spotify badge
3. **Amazon Music** - Link to Amazon + Amazon badge
4. **YouTube** - Link to YouTube playlist + YouTube badge

The badges will automatically display in a responsive grid on the podcast category archive pages.

## ACF Setup (Free Version)

This theme is configured to work with the **free version of Advanced Custom Fields**. 

### Setup Instructions:

1. **Install ACF Free**: Go to **Plugins → Add New** and install "Advanced Custom Fields"
2. **Import Field Group**: Go to **Custom Fields → Tools** and import `group_podcast_taxonomy.json`
3. **Sync Field Group**: The field group should appear in "Sync available" - click "Sync" to import

### Field Structure:

The configuration provides dropdown selections and URL fields for up to 5 podcast platforms:
- **Platform 1-5**: Dropdown to select from predefined platforms (Apple Podcasts, Spotify, Amazon Music, etc.)
- **Platform 1-5 Link**: URL field for the platform link
- **Badge images are automatically loaded** from the theme's assets directory

### Troubleshooting:

- **Fields not showing**: Make sure ACF is activated and the field group is synced
- **Clear cache**: Clear any caching plugins if fields don't appear
- **Check permissions**: Ensure you have proper user permissions to edit taxonomies

## Installation

Developed as a traditional WordPress theme, you can download this repository and drop it into the **wp-content > themes** directory and activate it from **Appearance > Themes** in the wp-admin Dashboard.
