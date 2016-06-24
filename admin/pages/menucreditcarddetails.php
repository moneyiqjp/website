<div class="row">
    <div class="col-lg-12">
        <div class="collapse navbar-collapse" id="navbar-admin-level2">
            <ul id="navlist" class="nav nav-justified">
<!--                <li><?php echo "$submenu ($id)" ?></li> -->
                <li><a href='<?php echo "$basename?item=CreditCardDetails&sub=$submenu&id=$id"?>'>Overview</a></li>
                <li><a href='<?php echo "$basename?item=CreditCardInterest&sub=$submenu&id=$id"?>'>Interest / Fee</a></li>
                <li><a href='<?php echo "$basename?item=CreditCardCampaign&sub=$submenu&id=$id"?>'>Campaign</a></li>
                <li><a href='<?php echo "$basename?item=CreditCardDiscount&sub=$submenu&id=$id"?>'>Discount</a></li>
                <li><a href='<?php echo "$basename?item=CreditCardInsurance&sub=$submenu&id=$id"?>'>Insurance</a></li>
                <li><a href='<?php echo "$basename?item=CreditCardRestriction&sub=$submenu&id=$id"?>'>Restrictions</a></li>
            </ul>
        </div>
    </div>
</div>