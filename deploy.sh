#!/bin/bash

echo "🚀 Starting deployment..."

# Stop containers
echo "⏹️  Stopping containers..."
docker-compose down

# Rebuild image
echo "🔨 Rebuilding Docker image..."
docker-compose build --no-cache

# Start containers
echo "▶️  Starting containers..."
docker-compose up -d

echo "✅ Deployment complete!"
echo "🌐 App URL: http://localhost:8002"
