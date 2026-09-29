# UNFINISHED — Preventing Maternal Mortality Campaign Website
## Administrator & Content Management Manual

---

## 1. Quick Access & Credentials

| Resource | Details |
|---|---|
| **Public Website URL** | `http://nigeria.test` (Local) / `https://your-domain.com` (Production) |
| **Admin Portal URL** | `http://nigeria.test/admin` / `https://your-domain.com/admin` |
| **Default Admin Email** | `admin@filamentphp.com` |
| **Default Admin Password** | `demo.Filament@2021!` |
| **Campaign WhatsApp Number** | `+234 915 068 4078` |

> [!IMPORTANT]
> **Action Required by Owner**: Please log in immediately and update the administrator email and password under **System > Users** to secure your portal.

---

## 2. Changing Admin Credentials (First Step)

To change the default login credentials to your personal or organization details:

1. Navigate to the Admin Portal at `/admin`.
2. Log in using `admin@filamentphp.com` and `demo.Filament@2021!`.
3. In the left navigation menu, scroll down to the **System** section and click **Users**.
4. Locate the **Demo User** (`admin@filamentphp.com`) in the table and click **Edit** (pencil icon).
5. Update the following fields:
   - **Name**: Enter the admin's name (e.g., Campaign Director).
   - **Email**: Enter your official email address.
   - **Password**: Enter a strong, private password (leave blank in future edits if not changing).
6. Click **Save Changes** at the bottom.

---

## 3. Managing Website Settings & WhatsApp Number

The site uses a dynamic Theme configuration so you can change phone numbers, brand colors, taglines, and social media links without editing any code.

### Updating the WhatsApp Number & Site Metadata
1. In the Admin sidebar, navigate to **Website > Themes**.
2. Click **Edit** on the **Unfinished** (`nigeria`) theme record.
3. Open the **Branding & Theme** tab/section:
   - **WhatsApp Number**: Currently configured as `+234 915 068 4078`. If your campaign number changes, update it here.
     - *Note: This automatically updates both the floating WhatsApp button and the footer WhatsApp Campaign Desk link across the entire website.*
   - **Site Name**: `unfinished`
   - **Tagline**: `Unfinished Dreams • Unfinished Futures`
   - **Primary Color**: `#f71089` (Deep Magenta/Hot Pink)
   - **Secondary Color**: `#ff269e`
   - **Logo**: Upload high-resolution PNG or WebP logo variations.
4. Expand **Footer & Socials**:
   - **Footer Text**: Copyright and organization disclaimer.
   - **Meta Description**: Default search engine summary for SEO.
   - **Social Links**: Update URLs for Facebook, Twitter/X, Instagram, and YouTube.
5. Click **Save Changes**.

---

## 4. Reviewing & Approving Community Stories

Citizens, doctors, and advocates submit personal testimonies and maternal health experiences via the public `/stories/submit` page.

1. In the Admin sidebar, navigate to **Website > Stories**.
2. New submissions appear with status **Pending**.
3. Click on a story to view the author's details and full testimony.
4. To publish the story on the live site:
   - Set **Status** to **Approved**.
   - Optional: Toggle **Featured** to pin the story to the top of the `/stories` feed and feature it on the homepage.
   - Set **Published At** date (defaults to current timestamp).
5. Click **Save Changes**.
6. If a submission contains spam or inappropriate content, set the status to **Rejected** or click **Delete**.

---

## 5. Monitoring Petition Signatures

Citizens sign the national petition directly on the homepage (`#petition`).

1. In the Admin sidebar, navigate to **Website > Petitions**.
2. View real-time signatures with:
   - **Name**
   - **Email**
   - **Role / Profession** (e.g., Healthcare worker, Legal advocate, Youth advocate, Citizen)
   - **State** (Lagos, Abuja FCT, Kano, Rivers, etc.)
   - **Signed Date**
3. Use the search bar to locate specific individuals or filter by state.
4. Export petition signatures to CSV/Excel for stakeholder advocacy presentations or legislative briefings.

---

## 6. Managing Contact Form Messages & WhatsApp Follow-Ups

When visitors reach out via the contact form:

1. In the Admin sidebar, navigate to **Website > Messages**.
2. You will see a list of incoming submissions with Name, Email, Phone, Subject, and Message.
3. **One-Click WhatsApp Reply**:
   - Click the **Reply on WhatsApp** button next to any message.
   - This immediately opens a WhatsApp conversation with a pre-filled greeting and reference to their message subject.
4. Toggle **Mark as Read** to keep your inbox organized.

---

## 7. Editing Pages & Dynamic Content

1. In the Admin sidebar, navigate to **Website > Pages**.
2. Click **Edit** on the `home` page to adjust custom SEO tags, title, and layout blocks.
3. To manage team members, partners, or causes:
   - Go to **Website > Collections**.
   - Select the relevant collection (e.g., `Team`, `Causes`, `Clients/Partners`).
   - Add, reorder, or edit items.

---

## 8. Public Website Features & Navigation

- **Landing Page (`/`)**:
  - **Hero Section**: Features the unified campaign headline: *"Unfinished Dreams. Unfinished Futures. Reform the law. Protect our future. Sign the petition."*
  - **10 Campaign Visuals Lightbox**: Interactive gallery showcasing the 10 official campaign graphics with 1-click downloads and social sharing for WhatsApp, X, Facebook, and Instagram.
  - **Petition Form**: Fast signature capture with instant validation.
  - **WhatsApp Floating Button**: Direct link to the campaign team (`+234 915 068 4078`).
- **Community Stories (`/stories`)**:
  - Public archive of verified healthcare worker and citizen voices.
- **Story Submission Form (`/stories/submit`)**:
  - Public submission portal for community testimonies.

---

## 9. Server & Deployment Checklist

When deploying changes to the production server:

```bash
# 1. Pull latest code from GitHub (branch 5.x)
git pull origin 5.x

# 2. Run migrations and seeders (if setting up fresh environment)
php artisan migrate --force
php artisan db:seed --class=NigeriaSeeder --force

# 3. Optimize application performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 4. Ensure storage symlink exists for media
php artisan storage:link
```
