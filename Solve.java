import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.Date;
import java.util.List;
import java.util.TimeZone;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

public class Chat {
    

    public void TryChat() throws InterruptedException {

        System.setProperty("webdriver.chrome.driver", "/Users/Administrator/Downloads/chromedriver.exe");
        WebDriver driver = new ChromeDriver();
        driver.get("https://cryptolottery.info/en/tron");

            String Newday = getBeijingDateTime();

            driver.findElement(By.className("calendar-btn_date")).click();
            List<WebElement> liElements = driver.findElements(By.className("calendar-day"));
            for (WebElement liElement : liElements) {
                String liText = liElement.getText();
                if (liText.equals(Newday)) {
                    liElement.click();
                    break; // Exit the loop when the desired element is found
                }
            }
            driver.findElement(By.className("confirm")).click();

            Thread.sleep(5000);
            WebElement secondRow1 = driver.findElement(By.cssSelector(".result-list:nth-child(2)"));
             WebElement secondRow2 = driver.findElement(By.cssSelector(".result-list:nth-child(3)"));
            String rowContent1 = secondRow1.getAttribute("innerText");
             String rowContent2 = secondRow2.getAttribute("innerText");
            System.out.println(rowContent1);
            System.out.println("-------------------------------");
            System.out.println(rowContent2);


       driver.quit();

       System.out.println(getBeijingDateTime());

    }

    public static String getBeijingDateTime() {
        SimpleDateFormat beijingFormat = new SimpleDateFormat("yyyy-MM-dd");
        beijingFormat.setTimeZone(TimeZone.getTimeZone("Asia/Shanghai"));
        LocalDate currentDate = LocalDate.now();
        LocalDate newDate = currentDate.plusDays(1);
        // Convert LocalDate to Date
        Date date = java.sql.Date.valueOf(newDate);
        return beijingFormat.format(date);
    }

}
