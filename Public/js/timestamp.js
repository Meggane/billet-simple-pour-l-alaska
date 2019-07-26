class Timestamp {
    time() {
        let id = document.getElementById("commentPost").textContent;

        let date = new Date();
        let year = date.getFullYear();
        let day = date.getDate();
        let month = date.getMonth();
        let hour = date.getHours();
        let min = date.getMinutes();
        let sec = date.getSeconds();

        let datePost = new Date(id);
        let yearPost = datePost.getFullYear();
        let dayPost = datePost.getDate();
        let monthPost = datePost.getMonth();
        let hourPost = datePost.getHours();
        let minPost = datePost.getMinutes();
        let secPost = datePost.getSeconds();

        let yearPassed = year - yearPost;
        let dayPassed = day - dayPost;
        let monthPassed = month - monthPost;
        let hourPassed = hour - hourPost;
        let minPassed = min - minPost;
        let secPassed = sec - secPost;

        function retour() {
            if (yearPassed >= 1) {
                return "Posté il y a " + yearPassed + " ans";
            } else if (monthPassed >= 1) {
                return "Posté il y a " + monthPassed + " month";
            } else if (yearPassed == 0 && monthPassed == 0) {
                if (hourPost > hour) {
                    hourPassed = 24 - hourPost + hour;
                }
                if (minPost > min) {
                    minPassed = 60 - minPost + min;
                }
                if (secPost > sec) {
                    secPassed = 60 - secPost + sec;
                }

                if (dayPassed == 0) {
                    if (hourPassed == 0) {
                        if (minPassed == 0) {
                            return "Posté il y a " + secPassed + "secondes";
                        }
                        return "Posté il y a " + minPassed + " minutes et " + secPassed + "secondes";
                    }
                    return "Posté il y a " + hourPassed + " hours, " + minPassed + " minutes et " + secPassed + "secondes";
                }
                return "Posté il y a " + dayPassed + " days, " + hourPassed + " hours, " + minPassed + " minutes et " + secPassed + "secondes";
            }
        }

        return retour();
    }
}

let timestamp = new Timestamp();

document.getElementById("commentPost").innerHTML = timestamp.time();