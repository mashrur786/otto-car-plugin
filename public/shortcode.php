<div class="container ocdc-container">
	<div class="row between-xs mb3">
        <div class="col-xs-12">
            <?php if($title != ''): ?>
                <h2 class="ocdc__intro ocdc__intro mb-5">
                    <?php echo $title; ?>
                </h2>
            <?php endif;  ?>
        </div>
    </div>
	<!-- eof row -->
    <div class="row">
        <?php foreach($this->agreements as $agreement) { ?>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="ocdc__item mb-5">
                <img class="img-responsive ocdc__img" src="<?php echo $agreement['img']; ?>" alt="">
                <p class="ocdc__model"><?php echo $agreement['vehicle']; ?></p>
                <p class="ocdc__cost" >
                    <b>£</b><span class="update-rent"><?php echo $agreement['weekly_rental']; ?></span> <b> / week </b>
                </p>
                <p class="ocdc_ _plate"">
                    <span><?php echo $agreement['agreement_length']; ?> years</span>
                </p>
                <form action="">
                    <div class="slide-container">
                        <p>Uber Clean Air Fund</p>
                        <label class="form-control mt-2" for="">1000</label>
                        <br>
                        <input type="range" min="0" max="5000" value="1000" class="slider">
                    </div>
                    <input type="hidden" name="agreement_lenght" value="<?php echo $agreement['agreement_length']; ?>">
                    <input type="hidden" name="weekly_rent" value="<?php echo $agreement['weekly_rental']; ?>">
                </form>
            </div>
        </div>
        <?php } ?>
	    <!-- eof col-->
    </div>
	<!-- eof row -->
</div>

