<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="title">EZ HOTEL
            <img src="Ocean.png" class="oceanblue" alt="imageerror">
        </div>

        <!-- <div class="container"> -->
            <!-- <div class="gambar">
                <img src="Ocean.png" class="oceanblue" alt="imageerror">
            </div>  -->
            <div class="Biodata">
                <form action="submit.php" method="post" style="font-size:22px">
                <!-- <div class="title">Hotel</div> -->
                <h2>Registration Form</h2>
                    <div class="name">
                        <p>Name:</p>
                        <input type="text" name="full_name" >
                    </div>
                
                    <div class="Phone">
                        <p>Phone:</p>
                        <input type="text" name="phone">
                    </div>
                
                    <div class="Email">
                        <p>Email:</p>
                        <input type="email" name="email">
                    </div>
                
                    <div class="gender">
                        <p>Gender:</p>
                        <div class="gender-option">
                            <div class="male">
                                <input type="radio" id="male" name="gender" value="Male">
                                <label for="male">Male</label></p>
                            </div>
                            <div>
                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="female">Female</label>
                            </div>
                        </div>
                    
                    </div>
                
                    <div class="creditcard">
                        <p>Credit Card:</p>
                        <input type="text" name="creditcard">
                    </div>
                    <div class="checkindate">
                        <p>Check In Date:</p>
                        <input type="date" name="checkinDate">
                    </div>

                    <div class="checkoutdate">
                        <p>Check Out Date:</p>
                        <input type="date" name="checkoutDate">
                    </div>
            
                    <div class="room">
                    <p><a href="/hoteldb/roomlist.php" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">Room -- Click Here For Room List </a></p>
                    <select name="RoomID">
                        <option value="101">101</option>
                        <option value="102">102</option>
                        <option value="103">103</option>
                        <option value="121">121</option>
                        <option value="122">122</option>
                        <option value="123">123</option>
                        <option value="201">201</option>
                        <option value="202">202</option>
                        <option value="203">203</option>
                        <option value="221">221</option>
                        <option value="222">222</option>
                    </select>
                    </div>
                
                    <button type="submit" class="submitbooknow">Book Now</button> </p>
                    <!-- <input type="submit" value="Book Now"> -->
                </form><br><br>
                <a href="/hoteldb/customerList.php" target="_blank" rel="noopener noreferrer" style="font-size:24px;">Click Here To See Full Reservation List</a><br>
            </div>
        <!-- </div> -->
    </body>
</html>