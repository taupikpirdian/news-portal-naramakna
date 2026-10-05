#!/bin/bash

echo "🚀 Starting deployment..."

# Build image dulu (app masih jalan)

echo "🔨 Rebuilding Docker image (no cache)..."
docker compose build --no-cache

# Recreate container tanpa mematikan service lain

echo "▶️  Restarting containers..."
docker compose up -d --no-deps --build

echo "✅ Deployment complete!"
