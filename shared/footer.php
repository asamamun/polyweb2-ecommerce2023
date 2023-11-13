<?php
use App\Url;
?>
<footer class="footer-section">
    <div class="container relative">
        <div class="sofa-img">
            <img src=<?= $img; ?> alt="Image" class="img-fluid" />
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="subscription-form">
                    <h3 class="d-flex align-items-center">
                        <span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid" /></span><span>Subscribe to Newsletter</span>
                    </h3>

                    <form action="#" class="row g-3">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Enter your name" />
                        </div>
                        <div class="col-auto">
                            <input type="email" class="form-control" placeholder="Enter your email" />
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary">
                                <span class="fa fa-paper-plane"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="mb-4 footer-logo-wrap">
                    <a href="#" class="footer-logo">Furni<span>.</span></a>
                </div>
                <p class="mb-4">
                    Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
                    quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                    vulputate velit imperdiet dolor tempor tristique. Pellentesque
                    habitant
                </p>

                <ul class="list-unstyled custom-social">
                    <li>
                        <a href="#"><span class="fa fa-brands fa-facebook-f"></span></a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-brands fa-twitter"></span></a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-brands fa-instagram"></span></a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-brands fa-linkedin"></span></a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-8">
                <div class="row links-wrap">
                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Knowledge base</a></li>
                            <li><a href="#">Live chat</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Our team</a></li>
                            <li><a href="#">Leadership</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Nordic Chair</a></li>
                            <li><a href="#">Kruzo Aero</a></li>
                            <li><a href="#">Ergonomic Chair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6">
                    <p class="mb-2 text-center text-lg-start">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        . All Rights Reserved. &mdash; Designed with love by
                        <a href="https://untree.co">Untree.co</a> Distributed By
                        <a hreff="https://themewagon.com">ThemeWagon</a>
                    </p>
                </div>

                <div class="col-lg-6 text-center text-lg-end">
                    <ul class="list-unstyled d-inline-flex ms-auto">
                        <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script>
<!-- <script src="<?= Url::link(); ?>assets/js/jquery-3.7.1.min.js"></script> -->
  <!-- <script src="<?= Url::link(); ?>assets/js/bootstrap.bundle.min.js"></script> -->
  <script src="<?= Url::link(); ?>assets/js/tiny-slider.js"></script>
  <script src="<?= Url::link(); ?>assets/js/cart.js"></script>
  <script src="<?= Url::link(); ?>assets/js/custom.js"></script>
<script>
    // let cart = new ShoppingCart();
    console.log(cart.show());
    $(document).ready(function() {
        // alert(5)
        $("#trxContainer").hide();
        $("#grandTotal").html(cart.getTotalAmount());
        let html = ``;
        let cartHtml = ``;
        if(cart.getTotalItems){
            let items = cart.show();
            for (const key in items) {  
                cartHtml +=`
                <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">${items[key].productName}</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">${items[key].quantity} x ${items[key].price} = ${items[key].price * items[key].quantity} </span>
        </li>`;          
                html += `<div class="card rounded-3 mb-4">
                
                    <div class="card-body p-4">
                    
                        <div class="row d-flex justify-content-between align-items-center">
                        <input type="hidden" class="pid" value="${key}"/>
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="https://images.unsplash.com/photo-1622445275463-afa2ab738c34?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8dHNoaXJ0fGVufDB8fDB8fHww&w=1000&q=80" class="img-fluid rounded-3" alt="Cotton T-shirt">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal mb-2"> ${items[key].productName}</p>
                                <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <input id="form1" min="0" name="quantity" value="${items[key].quantity}" type="number" class="pquan mx-2 form-control form-control-sm" />

                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0">$ <span class="pprice"> ${items[key].price} </span></h5>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0">$ <span class="tprice"> ${items[key].price * items[key].quantity} </span></h5>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a data-pid="${key}" href="javascript:void(0)" class="deleteproduct text-danger"><i class="fas fa-trash fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>`;
            };
            cartHtml += `<li class="list-group-item d-flex justify-content-between">
          <span>Total (Taka)</span>
          <strong>${cart.getTotalAmount()}</strong>
        </li>`
            $("#cardContainer").html(html);
            $("#cartContainer").html(cartHtml);
        }

        //change
        $("#cardContainer").on("change",".pquan",function(){
            $t = $(this);
            
            let id = $t.parent().parent().find(".pid").val();
            alert(id);
            cart.updateQuantity(id,$t.val());
            //console.log($(this).parent().parent().find(".pprice").html());
            let totalPrice = $t.val() * $t.parent().parent().find(".pprice").html();
            $t.parent().parent().find(".tprice").html(totalPrice);
            $("#grandTotal").html(cart.getTotalAmount());
        });
        //delete
        $("#cardContainer").on("click",".deleteproduct",function(){
            if(!confirm("are you sure you want to delete")) return;
            cart.removeItem($(this).data("pid"));
            location.reload();

        });

        $("input[name='paymentMethod']").change(function(){
            if($(this).val() == "cod"){
                $("#trxContainer").hide(500);
            } 
            else{
                $("#trxContainer").show(500);
            }
        });

        //placeOrder button click handler and ajax request
        $("#placeOrder").click(function(e){
            e.preventDefault();
            let paymentMethod = $("input[name='paymentMethod']:checked").val();
            // alert(paymentMethod);
            // return;
            let trxid = $("#trxid").val();
            let totalPrice = $("#grandTotal").html();
            $.ajax({
                url:"placeorder.php",
                method:"POST",
                data:{
                    paymentMethod:paymentMethod,
                    trxid:trxid,
                    totalPrice:totalPrice,
                    products: cart.show(),
                    fname: $("#firstName").val(),
                },
                success:function(data){
                    console.log(data);
                    if(data == "success"){
                        // location.reload();
                    }
                }
            });
        }); 
    });



</script>
</body>

</html>