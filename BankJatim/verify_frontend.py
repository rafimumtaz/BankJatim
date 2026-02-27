from playwright.sync_api import Page, expect, sync_playwright
import os
import subprocess
import time

def clear_slides():
    print("Clearing existing slides...")
    subprocess.run(["php", "artisan", "tinker", "--execute=App\\Models\\CarouselSlide::truncate();"], check=True, cwd="/app/BankJatim")

def verify_frontend(page: Page):
    clear_slides()

    # Login
    print("Logging in...")
    page.goto("http://localhost:8000/admin/login")
    page.get_by_label("Email address").fill("admin@example.com")
    page.locator("input[type='password']").fill("password")
    page.get_by_role("button", name="Sign in").click()

    # Wait for dashboard to ensure login success
    expect(page.get_by_role("heading", name="Dashboard")).to_be_visible()

    # Create Slide
    print("Creating Slide...")
    page.goto("http://localhost:8000/admin/carousel-slides/create")

    page.get_by_label("Title").fill("Frontend Fix Verification")
    page.get_by_label("Description").fill("Checking if the image loads correctly.")

    if not os.path.exists("/home/jules/verification/slide_image.jpg"):
        with open("/home/jules/verification/slide_image.jpg", "wb") as f:
            f.write(os.urandom(1024))

    page.locator("input[type='file']").set_input_files("/home/jules/verification/slide_image.jpg")

    # Wait for upload to complete
    page.wait_for_timeout(3000)

    # Submit
    page.get_by_role("button", name="Create", exact=True).click()

    # Wait for completion - check for success notification or redirect
    page.wait_for_timeout(3000)

    # Verify Frontend
    print("Verifying Frontend...")
    page.goto("http://localhost:8000/")

    # Check for slide title
    expect(page.get_by_text("Frontend Fix Verification")).to_be_visible()

    # Check for image src
    img = page.locator("img[alt='Frontend Fix Verification']")
    expect(img).to_be_visible()

    src = img.get_attribute("src")
    print(f"Image Source: {src}")

    if "storage/carousel-slides" in src:
        print("Image source looks correct.")
    else:
        print("WARNING: Image source might be incorrect.")

    page.screenshot(path="/home/jules/verification/frontend_fix.png")
    print("Screenshot saved to /home/jules/verification/frontend_fix.png")

if __name__ == "__main__":
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        page = browser.new_page()
        try:
            verify_frontend(page)
        except Exception as e:
            print(f"Verification failed: {e}")
            page.screenshot(path="/home/jules/verification/frontend_failure.png")
            raise e
        finally:
            browser.close()
