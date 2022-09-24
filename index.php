<!DOCTYPE html>
<?php include "includes/init.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style/css/style.css">
    <title>مصرفي</title>
</head>
<body>
    <header>
        <div class="logo">
            <span>مصرفي</span>
        </div> 

        <div class="navbar">
            <ul>
                <li><a href="index.php">الرئيسية</a></li>
                <li><a href="mybank/deposit.php">ايداع</a>
                <li><a href="mybank/withdrawal.php">سحب</a></li>
                <li> <p>طلب خدمة</p>
                    <div class="dropdown">
                        <a href="mybank/electricServices.php">شراء كهرباء </a>
                        <hr>
                        <a href="mybank/mobileService.php">شراء رصيد </a>
                        <hr>
                        <a href="mybank/eduServices.php">دفع رسوم  دراسة</a>

                    </div>
                <li><a href="mybank/addcustomer.php">اضافة عميل</a></li>
                <li><a href="mybank/customer.php">بيانات العملاء</a></li>
                <li><a href="mybank/report.php">تقرير</a></li>
                <?php if($session->is_signed()){
                  /// TO LET ONLY MANAGERS INTER ADMIN SECTION
        $employee = Employee::find_by_id($session->user_id);
        if($employee->jopId == MANAGER){?>
          <li><a href="admin">Admin</a></li>
     <?php }}?>
            </ul>
    </div>

    <div class="auth">
      <?php 
      // TO FORCE LOG BEFORE USE ANY THING
      if($session->is_signed()){?>
        <div >
        <span id="userNameLoged"></span>
        <a href="includes/logout.php"><span id='signOut' href="">خروج</span></a>
       </div>
     <?php }else{redirect('mybank/login.php');}?>
           

           
    </div>

    </header>

<section>
    <div class="container">
         <h1 class="title">الان مع خدمة مصرفي الخدمات المختلفة .. كهرباء وشراء رصيد للمكالمات بالاضافة الى سداد الفواتير الحكومية و  سداد الرسوم الجامعية</h1>
            <div class="service">

                
            
                
                <a style="text-decoration: none;" href="mybank/report.php">
                <div class="card-services">
                    <div class="card-services-content">
                        <i class="fab fa-ubuntu" ></i>
                        <br>
                      <h3 style="color:#186A3B;">استعلام عن عميل</h3>
                    </div>
                </div>
                </a>


                <a style="text-decoration: none;" href="mybank/addcustomer.php">
                <div class="card-services">
                    <div class="card-services-content">
                        <i class="fab fa-ubuntu" ></i>
                          <br>
                          
                        <h3 style="color:#BC0E4C ;"> اضافة عميل جديد</h3>
                      </div>
                  </div>
                </a>


                <a style="text-decoration: none;" href="mybank/deposit.php">
                  <div class="card-services">
                    <div class="card-services-content">
                          <i class="fab fa-ubuntu" ></i>
                          <br>
                          
                        <h3 style="color:#1B4F72 ;">ايداع نقدي</h3>
                      </div>
                  </div>
                </a>


                <a style="text-decoration: none;" href="mybank/electricServices.php">
                  <div  class="card-services">
                    <div class="card-services-content">
                          
                          <br>
                        <h3 style="color:#4A235A ;">دفع فاتورة كهرباء</h3>
                      </div>
                  </div>
                  </a>


                  <a style="text-decoration: none;" href="mybank/eduServices.php">
                <div class="card-services">
                    <div class="card-services-content">
                          <i class="fab fa-ubuntu" ></i>
                          <br>
                          
                        <h3 style="color:#4D5656 ;">دفع رسوم جامعية</h3>
                      </div>
                  </div>
                  </a>


                  <a style="text-decoration: none;" href="mybank/withdrawal.php">
                  <div  class="card-services">
                    <div class="card-services-content">
                        <i class="fa fa-code" ></i>
                        <br>
                        <h3 style="color:#7D6608 ;">سحب نقدي</h3>
                    </div>
                </div>
            </div>
    </div>
</section>
</body>
</html>