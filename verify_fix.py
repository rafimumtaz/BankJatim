
from playwright.sync_api import sync_playwright
import sys

def verify_carousel_image():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        page = browser.new_page()

        # Navigate to the landing page
        page.goto("http://127.0.0.1:8081/")

        # Wait for the carousel container to ensure page loaded
        try:
            page.wait_for_selector(".relative.h-\[600px\]", timeout=5000)
        except Exception as e:
            print(f"Error waiting for carousel container: {e}")
            page.screenshot(path="debug_screenshot.png")
            browser.close()
            return

        # Take a screenshot
        page.screenshot(path="verification_screenshot.png")

        # Check if any img tag inside the carousel exists
        # Based on blade template: .carousel-slide is not a class, it uses x-show.
        # The image is inside: <div class="absolute inset-0"><img ...></div>

        # Let's try to find the image by its partial src or class
        # img class="w-full h-full object-cover object-right"

        images = page.locator("img.object-cover")
        count = images.count()
        print(f"Found {count} carousel images.")

        if count > 0:
            first_image = images.first
            image_src = first_image.get_attribute("src")
            print(f"First Image Source: {image_src}")

            # Check if image loaded
            is_loaded = page.evaluate("""
                (img) => {
                    return img.naturalWidth > 0;
                }
            """, first_image.element_handle())

            if is_loaded:
                print("Image loaded successfully.")
            else:
                print("Image failed to load (naturalWidth=0).")
        else:
            print("No carousel images found on page.")

        browser.close()

if __name__ == "__main__":
    verify_carousel_image()
