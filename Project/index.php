<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Tanaygeet Shrivastava" content="Author, Developer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonynous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="icon" href="images/logo/ico.png">
    <title>KNAPP - Login</title>
</head>

<body>
    <div class="formcontainer">
        <form action="DB/verify.php" method="GET" autocomplete="on">
            <iframe src="https://free.timeanddate.com/clock/i8b9jg6n/n1041/szw80/szh80/hocfff/hbw1/hfc003f63/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw12/mqd100/mhcfff/mhl15/mhw4/mhd100/mmv0/hhcff9/hmcff9/hscfff/hsw3" frameborder="0" width="80" height="80"></iframe>
            <h2>Login</h2>
            <div class="form">
                <label for="userid"><svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.56708 11.2052C5.46696 10.1051 4.84892 8.61303 4.84892 7.05722C4.84892 5.50142 5.46696 4.00934 6.56708 2.90922C7.6672 1.8091 9.15928 1.19106 10.7151 1.19106C12.2709 1.19106 13.763 1.8091 14.8631 2.90922C15.9632 4.00934 16.5812 5.50142 16.5812 7.05722C16.5812 8.61303 15.9632 10.1051 14.8631 11.2052C13.763 12.3053 12.2709 12.9234 10.7151 12.9234C9.15928 12.9234 7.6672 12.3053 6.56708 11.2052ZM19.4525 23.4082H1.10396C0.938536 23.4082 0.779886 23.3425 0.662913 23.2256C0.54594 23.1086 0.480225 22.9499 0.480225 22.7845V20.1633C0.480225 19.071 0.914157 18.0233 1.68656 17.2509C2.45897 16.4785 3.50657 16.0446 4.59892 16.0446H16.8312C17.9236 16.0446 18.9712 16.4785 19.7436 17.2509C20.516 18.0233 20.9499 19.071 20.9499 20.1633V22.7845C20.9499 22.9499 20.8842 23.1086 20.7673 23.2256C20.6503 23.3425 20.4916 23.4082 20.3262 23.4082H19.4525Z" fill="#E2E2E2" stroke="black" stroke-width="0.5" />
                    </svg>
                    <input type="text" autocomplete="on" name="erpid" placeholder="User-Id" required></label><br>
                <label for="password"><svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3498 0.616669C9.42259 0.616669 7.87326 0.972759 6.41531 1.36916C4.92376 1.77228 3.42012 2.24931 2.53594 2.53821C2.16627 2.66029 1.83853 2.88418 1.59037 3.18415C1.34222 3.48412 1.18372 3.84801 1.13308 4.23401C0.332211 10.2499 2.1906 14.7084 4.44539 17.6579C5.40157 18.9197 6.54166 20.0308 7.82757 20.9541C8.34626 21.321 8.82731 21.6018 9.23581 21.794C9.61206 21.9713 10.0165 22.1165 10.3498 22.1165C10.683 22.1165 11.0861 21.9713 11.4637 21.794C11.9562 21.5546 12.4273 21.2736 12.872 20.9541C14.1579 20.0308 15.298 18.9197 16.2541 17.6579C18.5089 14.7084 20.3673 10.2499 19.5665 4.23401C19.5159 3.84782 19.3575 3.48372 19.1093 3.18352C18.8612 2.88332 18.5334 2.65919 18.1636 2.53687C16.8801 2.11603 15.5866 1.72623 14.2842 1.36782C12.8263 0.974103 11.2769 0.616669 10.3498 0.616669ZM10.3498 7.33535C10.8258 7.33464 11.2867 7.50242 11.6508 7.80897C12.015 8.11552 12.2589 8.54105 12.3394 9.0102C12.4198 9.47935 12.3317 9.96185 12.0905 10.3722C11.8493 10.7826 11.4707 11.0944 11.0216 11.2523L11.539 13.9264C11.5578 14.0236 11.5549 14.1239 11.5304 14.2199C11.506 14.3159 11.4606 14.4053 11.3976 14.4817C11.3345 14.5581 11.2553 14.6196 11.1657 14.6618C11.0761 14.704 10.9783 14.7259 10.8792 14.7259H9.82034C9.72139 14.7257 9.6237 14.7037 9.53425 14.6614C9.4448 14.6191 9.3658 14.5575 9.3029 14.4811C9.24 14.4048 9.19474 14.3154 9.17037 14.2195C9.14599 14.1236 9.1431 14.0235 9.1619 13.9264L9.6779 11.2523C9.22887 11.0944 8.85023 10.7826 8.60905 10.3722C8.36786 9.96185 8.2797 9.47935 8.36017 9.0102C8.44064 8.54105 8.68456 8.11552 9.04871 7.80897C9.41287 7.50242 9.87376 7.33464 10.3498 7.33535V7.33535Z" fill="#E2E2E2" />
                    </svg>
                    <input type="password" name="passwd" autocomplete="on" placeholder="Password" required></label><br>
                <label for="captcha">
                    <svg width="20" height="23" viewBox="0 0 34 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M29 3H26V1.5H29.75C30.17 1.5 30.5 1.83 30.5 2.25V5.25C30.5 5.67 30.17 6 29.75 6H29V7.5H27.5V4.5H29V3ZM27.5 10.5H29V9H27.5V10.5ZM24.5 1.5H23V7.5H24.5V1.5ZM33.5 19.5V24C33.5 24.825 32.825 25.5 32 25.5H30.5V27C30.5 28.665 29.165 30 27.5 30H6.5C5.70435 30 4.94129 29.6839 4.37868 29.1213C3.81607 28.5587 3.5 27.7956 3.5 27V25.5H2C1.175 25.5 0.5 24.825 0.5 24V19.5C0.5 18.675 1.175 18 2 18H3.5C3.5 12.195 8.195 7.5 14 7.5H15.5V5.595C14.6 5.085 14 4.11 14 3C14 1.35 15.35 0 17 0C18.65 0 20 1.35 20 3C20 4.11 19.4 5.085 18.5 5.595V7.5H20C20.51 7.5 21.005 7.545 21.5 7.62V12H28.61C29.8437 13.7572 30.5038 15.853 30.5 18H32C32.825 18 33.5 18.675 33.5 19.5ZM14 20.25C14 19.2554 13.6049 18.3016 12.9017 17.5983C12.1984 16.8951 11.2446 16.5 10.25 16.5C9.25544 16.5 8.30161 16.8951 7.59835 17.5983C6.89509 18.3016 6.5 19.2554 6.5 20.25C6.5 21.2446 6.89509 22.1984 7.59835 22.9017C8.30161 23.6049 9.25544 24 10.25 24C11.2446 24 12.1984 23.6049 12.9017 22.9017C13.6049 22.1984 14 21.2446 14 20.25ZM27.5 20.25C27.5 19.2554 27.1049 18.3016 26.4017 17.5983C25.6984 16.8951 24.7446 16.5 23.75 16.5C22.7554 16.5 21.8016 16.8951 21.0983 17.5983C20.3951 18.3016 20 19.2554 20 20.25C20 21.2446 20.3951 22.1984 21.0983 22.9017C21.8016 23.6049 22.7554 24 23.75 24C24.7446 24 25.6984 23.6049 26.4017 22.9017C27.1049 22.1984 27.5 21.2446 27.5 20.25ZM24.5 9H23V10.5H24.5V9Z" fill="#E2E2E2" />
                    </svg>
                    <div class="captchaBox">
                        <img src="images/captcha/c(0).png" alt="captcha" id="captcha"><i id="re-cap" class="fas fa-sync"></i><input type="text" name="captcha" pattern="WRZSR5B" id="cVal" placeholder="Captcha" required>
                    </div>
                </label><br>
                <button type="submit">LOGIN</button>
            </div>
            <a class="forget" href="forget.php">Forgot Password? Click Here</a>
        </form>
    </div>
</body>

<script>
    $(function() {
        let cap = document.getElementById("captcha");
        let n;
        setTimeout(() => {
            n = parseInt(Math.random() * 10);
            cap.src = 'images/captcha/c(' + n + ').png';
            switch (n) {
                case 1:
                    document.getElementById("cVal").pattern = "V4XBG";
                    break;
                case 2:
                    document.getElementById("cVal").pattern = "75NP2DW";
                    break;
                case 3:
                    document.getElementById("cVal").pattern = "8t3Umzg";
                    break;
                case 4:
                    document.getElementById("cVal").pattern = "HYuTFZT";
                    break;
                case 5:
                    document.getElementById("cVal").pattern = "bybNmeZ";
                    break;
                case 6:
                    document.getElementById("cVal").pattern = "pRbwf3L";
                    break;
                case 7:
                    document.getElementById("cVal").pattern = "VKEbBpU";
                    break;
                case 8:
                    document.getElementById("cVal").pattern = "LZz5H6S";
                    break;
                case 9:
                    document.getElementById("cVal").pattern = "pd7LfWr";
                    break;
                default:
                    document.getElementById("cVal").pattern = "WRZSR5B";
            };
        }, 0);
        $("#re-cap").click(function() {
            n = parseInt(Math.random() * 10);
            cap.src = 'images/captcha/c(' + n + ').png';
            switch (n) {
                case 1:
                    document.getElementById("cVal").pattern = "V4XBG";
                    break;
                case 2:
                    document.getElementById("cVal").pattern = "75NP2DW";
                    break;
                case 3:
                    document.getElementById("cVal").pattern = "8t3Umzg";
                    break;
                case 4:
                    document.getElementById("cVal").pattern = "HYuTFZT";
                    break;
                case 5:
                    document.getElementById("cVal").pattern = "bybNmeZ";
                    break;
                case 6:
                    document.getElementById("cVal").pattern = "pRbwf3L";
                    break;
                case 7:
                    document.getElementById("cVal").pattern = "VKEbBpU";
                    break;
                case 8:
                    document.getElementById("cVal").pattern = "LZz5H6S";
                    break;
                case 9:
                    document.getElementById("cVal").pattern = "pd7LfWr";
                    break;
                default:
                    document.getElementById("cVal").pattern = "WRZSR5B";
            };
        });
    });
    setTimeout(() => {
        var agent = navigator.userAgent;
        var type = /android|iphone|kindle|ipad/i;
        if (type.test(agent)) {
            alert("Open KNAPP on Desktop/ PC Browser For More Better Expericence.");
        }
    }, 1000);
</script>

</html>