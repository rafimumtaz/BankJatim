
from playwright.sync_api import sync_playwright

def verify_admin_panel():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        page = browser.new_page()

        # Navigate to the admin login page
        page.goto("http://127.0.0.1:8081/admin/login")

        # Fill in the login form (assuming default credentials for now, or just checking if page loads)
        # Note: I don't have the credentials, so I can only verify the login page loads.
        # However, the resource page is protected.
        # To truly verify the resource page, I would need to log in.
        # For now, I'll just check if the login page loads without error.

        expect_title = "Bank Jatim"
        actual_title = page.title()
        print(f"Page Title: {actual_title}")

        if expect_title in actual_title:
             print("Admin login page loaded successfully.")

        # Take a screenshot
        page.screenshot(path="admin_verification.png")

        browser.close()

if __name__ == "__main__":
    verify_admin_panel()
