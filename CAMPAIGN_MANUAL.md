# UNFINISHED — Preventing Maternal Mortality Campaign
## Live Website & Administrator Operation Manual

---

## 1. Quick Access & Live Directory

### 🌐 Public Website Links
| Feature / Page | Live Production URL |
|---|---|
| **Campaign Homepage** | [https://unfinished.africa](https://unfinished.africa) |
| **Sign the Petition (Direct Anchor)** | [https://unfinished.africa/#petition](https://unfinished.africa/#petition) |
| **Official 10 Campaign Visuals Lightbox** | [https://unfinished.africa/#gallery](https://unfinished.africa/#gallery) |
| **Research & Maternal Mortality Data** | [https://unfinished.africa/#stats](https://unfinished.africa/#stats) |
| **Community Stories Directory** | [https://unfinished.africa/stories](https://unfinished.africa/stories) |
| **Public Story Submission Portal** | [https://unfinished.africa/stories/submit](https://unfinished.africa/stories/submit) |

---

### 💬 Official WhatsApp Links
| Action | Direct Link |
|---|---|
| **Campaign Desk WhatsApp** | [https://wa.me/2349150684078](https://wa.me/2349150684078) |
| **Pre-filled Support Message** | [https://wa.me/2349150684078?text=I%20want%20to%20support%20the%20Unfinished%20Preventing%20Maternal%20Mortality%20Campaign](https://wa.me/2349150684078?text=I%20want%20to%20support%20the%20Unfinished%20Preventing%20Maternal%20Mortality%20Campaign) |
| **Phone Number** | `+234 915 068 4078` |

---

### 🔐 Admin Portal & Direct Navigation Links
| Administrative Function | Direct Admin URL |
|---|---|
| **Admin Login Screen** | [https://unfinished.africa/admin/login](https://unfinished.africa/admin/login) |
| **Main Dashboard** | [https://unfinished.africa/admin](https://unfinished.africa/admin) |
| **Change Admin Password / Users** | [https://unfinished.africa/admin/settings/users](https://unfinished.africa/admin/settings/users) |
| **Branding, Theme & WhatsApp Number** | [https://unfinished.africa/admin/website/branding](https://unfinished.africa/admin/website/branding) |
| **Community Stories Moderation** | [https://unfinished.africa/admin/website/stories](https://unfinished.africa/admin/website/stories) |
| **Petition Signers & CSV Export** | [https://unfinished.africa/admin/website/petitions](https://unfinished.africa/admin/website/petitions) |
| **Contact Form Messages & WhatsApp Reply** | [https://unfinished.africa/admin/website/messages](https://unfinished.africa/admin/website/messages) |
| **CMS Pages** | [https://unfinished.africa/admin/website/pages](https://unfinished.africa/admin/website/pages) |
| **Navigation Menus** | [https://unfinished.africa/admin/website/menus](https://unfinished.africa/admin/website/menus) |
| **Collections (Causes, Team, Partners)** | [https://unfinished.africa/admin/website/collections](https://unfinished.africa/admin/website/collections) |

---

### 📦 Default Credentials & Deployment Details

| Setting | Production Value |
|---|---|
| **Default Admin Email** | `admin@filamentphp.com` |
| **Default Admin Password** | `demo.Filament@2021!` |
| **Hosting Environment** | Krystal Shared Hosting (cPanel) |
| **Server Subdomain Directory** | `/home/{username}/unfinished.africa` |
| **Recommended Document Root** | `unfinished.africa/public` (or `unfinished.africa` using root `.htaccess`) |
| **GitHub Repository** | [https://github.com/tawandajosephmutsena/nigeria](https://github.com/tawandajosephmutsena/nigeria) |
| **Git Deployment Branch** | `5.x` |

> [!IMPORTANT]
> **Action Required by Owner**: Please log in immediately at [https://unfinished.africa/admin/login](https://unfinished.africa/admin/login) and change the administrator email and password under **Settings > Users** ([https://unfinished.africa/admin/settings/users](https://unfinished.africa/admin/settings/users)).

---

## 2. Step-by-Step Owner Guides

### Step 1: Change Admin Credentials (Crucial)
1. Go to [https://unfinished.africa/admin/login](https://unfinished.africa/admin/login).
2. Log in using `admin@filamentphp.com` and `demo.Filament@2021!`.
3. In the sidebar, go to **Settings > Users** or open [https://unfinished.africa/admin/settings/users](https://unfinished.africa/admin/settings/users).
4. Click **Edit** (pencil icon) on the **Demo User** account.
5. Update:
   - **Name**: Enter your official name or organization title.
   - **Email**: Enter your real email address.
   - **Password**: Enter your new secure password (leave blank on subsequent edits if not changing).
6. Click **Save Changes**.

---

### Step 2: Manage Site Theme, Branding & WhatsApp Number
The website dynamically derives colors, logos, and phone links from the database:
1. Open [https://unfinished.africa/admin/website/branding](https://unfinished.africa/admin/website/branding).
2. Under **Branding & Theme**:
   - **WhatsApp Number**: Currently configured as `+234 915 068 4078`. Updating this field instantly updates both the floating WhatsApp button and the footer WhatsApp campaign desk link across the entire public website.
   - **Site Name**: `unfinished`
   - **Tagline**: `Unfinished Dreams • Unfinished Futures`
   - **Primary Color**: `#f71089` (Deep Magenta/Hot Pink)
   - **Secondary Color**: `#ff269e`
   - **Logo**: Upload and update custom campaign logos.
3. Under **Footer & Socials**:
   - **Footer Text**: Copyright & organization disclaimer.
   - **Meta Description**: Search engine and social preview description.
   - **Social Links**: Direct URLs for Facebook, Twitter/X, Instagram, and YouTube.
4. Click **Save Changes**.

---

### Step 3: Review and Publish Community Stories
Citizens, healthcare professionals, and advocates submit testimonies via [https://unfinished.africa/stories/submit](https://unfinished.africa/stories/submit):
1. Open [https://unfinished.africa/admin/website/stories](https://unfinished.africa/admin/website/stories).
2. Incoming submissions arrive with status **Pending**.
3. Click on any story to review the submitter's testimony, name, and contact details.
4. To approve for the live website:
   - Change **Status** from `Pending` to **`Approved`**.
   - Optional: Check **Featured** to pin the testimony to the top of the [Stories directory](https://unfinished.africa/stories) and highlight it on the homepage.
   - Confirm the **Published At** date.
5. Click **Save Changes**. The story is now publicly visible at `https://unfinished.africa/stories/{slug}` and on the homepage.
6. To decline or remove spam, set the status to **Rejected** or click **Delete**.

---

### Step 4: Monitor Petition Signatures & Export Data
Citizens sign the national petition directly on the homepage at [https://unfinished.africa/#petition](https://unfinished.africa/#petition):
1. Open [https://unfinished.africa/admin/website/petitions](https://unfinished.africa/admin/website/petitions).
2. View real-time signatures with:
   - **Full Name**
   - **Email Address**
   - **Role / Profession** (Healthcare worker, Legal advocate, Youth advocate, Citizen)
   - **State** (all 36 Nigerian states + FCT Abuja)
   - **Date Signed**
3. Use the search bar to locate specific individuals or filter signatures by state or profession.
4. Export the data to CSV/Excel for legislative briefings, policy presentations, or stakeholder campaigns.

---

### Step 5: Respond to Inquiries via One-Click WhatsApp
When visitors submit an inquiry via the website contact form:
1. Open [https://unfinished.africa/admin/website/messages](https://unfinished.africa/admin/website/messages).
2. Incoming messages display the visitor's Name, Email, Phone, Subject, Message, and Date.
3. Click **Reply on WhatsApp** next to any record:
   - This immediately launches WhatsApp with a pre-filled greeting referencing the visitor's name and message subject.
4. Use **Mark as Read / Unread** to track handled conversations.

---

## 3. Krystal Shared Hosting (cPanel) Deployment Architecture

The repository is **fully turnkey** and requires **no compilation, no Node.js, and no Composer CLI** on the server:

- ✅ **Pre-installed PHP Libraries**: `vendor/` is committed and autoloader-optimized.
- ✅ **Pre-compiled Assets**: `public/build/` contains Vite CSS and JS bundles.
- ✅ **Pre-published Admin Assets**: `public/css/`, `public/js/`, and `public/fonts/` contain Filament components.
- ✅ **Pre-seeded SQLite Database**: `database/database.sqlite` contains the complete database schema, active Nigeria theme, initial admin account, and seed stories.
- ✅ **cPanel Subdomain Routing**: Root `.htaccess` routes requests directly into `public/`.

### Deployment Procedure (cPanel Git Version Control)

1. **Pull the Code**:
   In cPanel **Git Version Control** (or via SSH in `/home/{username}/unfinished.africa`):
   ```bash
   cd ~/unfinished.africa
   git pull origin 5.x
   ```

2. **Initialize Environment**:
   In cPanel **File Manager** (or via SSH):
   ```bash
   cp .env.example .env
   ```
   *The `.env.example` file is already tailored with `https://unfinished.africa`, a valid `APP_KEY`, and SQLite database configuration.*

3. **Verify Document Root in cPanel**:
   In **cPanel > Domains**:
   - Set Document Root to `unfinished.africa/public` (recommended) or `unfinished.africa`.

4. **Verify Folder Permissions**:
   Ensure write permissions (`755` or `775`) on:
   - `storage/`
   - `bootstrap/cache/`
   - `database/` (and `database/database.sqlite`)
