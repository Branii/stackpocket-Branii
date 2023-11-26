import java.time.LocalDate;
import java.time.format.DateTimeFormatter;

public class TimeChecker {

    public String checkTime(String timeString, String dateString) {
        if (timeString.equals("00:00:00")) {
            LocalDate date = LocalDate.parse(dateString);
            LocalDate subtractedDate = date.minusDays(1);
            DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd");
            return subtractedDate.format(formatter);
        }
        return dateString;
    }
    
}
