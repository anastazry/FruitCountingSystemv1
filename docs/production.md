# Render + Neon deployment

`render.yaml` provisions a free Docker web service in Singapore, deploying commits pushed to `master`. `Dockerfile` builds local Vite assets and serves Laravel with Apache and OPcache. Startup runs migrations, never the demo account seeder.

## Account setup

1. Sign into Render using the GitHub account that owns this repository and grant access to this repository.
2. Create a Neon Free project, choosing a nearby region. Copy its PostgreSQL connection URL with `sslmode=require` into Render's secret `DB_URL` field; never commit it.
3. Create a Render Blueprint from this repository with the Free service plan.
4. Supply `APP_KEY` (a new permanent Laravel encryption key), `APP_URL` (the Render HTTPS URL), and `DB_URL` when prompted. Do not reuse a temporary key or regenerate it on redeploys.
5. Verify build logs, migrations, `/up`, HTTPS login, and reporting before using real data.

## Remaining launch requirements

- Uploaded photos use a private Neon Object Storage bucket in production (`HARVEST_PHOTO_DISK=s3`). Configure the AWS endpoint, access key, secret, bucket and region in Render. Photo previews use signed URLs valid for ten minutes. Local development still uses the public disk.
- Provision the initial admin account with a private password. Demo seed accounts must not be created on the public service.
- Free services sleep and have quotas. The first visit after inactivity can take longer. Check current provider limits before relying on the app for daily operations.
- Docker and PostgreSQL integration must be verified in the actual deployment. Local tests use SQLite and do not prove PostgreSQL compatibility.

## Updates

After this setup, tested changes committed and pushed to `master` automatically deploy to the live Render service. Editing local files alone does not deploy them. Review migration changes before pushing because startup applies them to the production database.

Never commit `.env`, app keys, database URLs, or uploaded files. `.dockerignore` also excludes these from image builds.
