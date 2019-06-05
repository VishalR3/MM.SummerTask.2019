<div class="container" id="slider">
            <div class="carousel slide" data-ride="carousel" id="myslide">
                <ol class="carousel-indicators">
                    <li data-target="#myslide" data-slide-to="0" class="active"></li>
                    <li data-target="#myslide" data-slide-to="1"></li>
                    <li data-target="#myslide" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo base_url(); ?>assets/img/red.png" style="object-fit: cover;width:100%;height:300px;">
                        <div class="carousel-caption">
                            <h3>The greatest news</h3>
                            <p>This is the first and foremost news on my web.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                            <img src="<?php echo base_url(); ?>assets/img/blue.png" style="object-fit: cover;width:100%;height:300px;">
                            <div class="carousel-caption">
                                    <h3>The Not so greatest news</h3>
                                    <p>This is the second news on my web.</p>
                            </div>
                    </div>
                    <div class="carousel-item">
                            <img src="<?php echo base_url(); ?>assets/img/green.png" style="object-fit: cover;width:100%;height:300px;">
                            <div class="carousel-caption">
                                    <h3>The news</h3>
                                    <p>This is the 1 ,2.. oh yeah, third news on my web.</p>
                            </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myslide" data-slide="prev"><i class="carousel-control-prev-icon"></i></a>
                <a class="carousel-control-next" href="#myslide" data-slide="next"><i class="carousel-control-next-icon"></i></a>
            </div>
        </div>
        <div class="container" id="latest">
                <div class="title">Latest News</div>
                <div class="row">
                <div class="col-sm-4 news">
                    <img src="<?php echo base_url(); ?>assets/img/coates.jpg" style="object-fit: cover; width:300px;height:300px;">
                      <div class="data">
                          <h3>Ta-Nehisi Coates Reads “Conduction”</h3>
                          <?php echo word_limiter('<p>Ta-Nehisi Coates reads&nbsp;<a href="https://www.newyorker.com/magazine/2019/06/10/conduction">his story</a>&nbsp;from the June 10 &amp; 17, 2019, issue of the magazine. Coates is the author of the nonfiction books &ldquo;<a href="https://www.amazon.com/dp/0385527462/?tag=thneyo0f-20" target="_blank">The Beautiful Struggle</a>,&rdquo; &ldquo;<a href="https://www.amazon.com/dp/0399590560/?tag=thneyo0f-20" target="_blank">We Were Eight Years in Power</a>,&rdquo; and &ldquo;<a href="https://www.amazon.com/dp/0812993543/?tag=thneyo0f-20" target="_blank">Between the World and Me</a>,&rdquo; which won the National Book Award, in 2015. His first novel, &ldquo;<a href="https://www.amazon.com/dp/0399590595/?tag=thneyo0f-20" target="_blank">The Water Dancer</a>,&rdquo; from which this story is adapted, will be published in September.</p>',15); ?>
                      
                    </div>

                   </div>
                <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/green.png" style="object-fit: cover; width:300px;height:300px;"></div>
                <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/blue.png" style="object-fit: cover; width:300px;height:300px;"></div>
                </div>
        </div>
        <div class="container" id="grid">
        <div class="row">
            <div class="col-sm-9" id="Content">
                <div class="title">Editorial</div>
                <div class="row" id="editorial">
                    <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/violet.png" style="object-fit: cover; width:inherit;height: inherit;"></div>
                    <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/yellow.png" style="object-fit: cover; width:inherit;height: inherit;"></div>
                    <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/red.png" style="object-fit: cover; width:inherit;height: inherit;"></div>
                </div>
                <div class="title">Most Popular</div>
                <div class="row" id="Popular">
                    <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/green.png" style="object-fit: cover; width:inherit;height: inherit;"></div>
                    <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/blue.png" style="object-fit: cover; width:inherit;height: inherit;"></div>
                    <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/violet.png" style="object-fit: cover; width:inherit;height: inherit;"></div>
                </div>
            </div>
            <div class="col-sm-3" id="info">
                <div class="card-2" id="poll">
                    <h4>Poll</h4>
                    <p><strong>What do you think of That?</strong></p>
                    <form>
                        <input type="radio" name="vote" value="1">Doesn't Care</br>
                        <input type="radio" name="vote" value="2">Doesn't Care</br>
                        <input type="radio" name="vote" value="3">Doesn't Care</br>
                        <input type="submit" value="Vote" class="btn btn-primary" id="voteb">
                    </form>
                </div>
                <div class="card-2" id="query">
                    <p><strong>Having Trouble Knowing Things?</strong></p>
                    <p>If you have any doubts or queries, you can ask us freely. We will be very happy to answer as many questions as we can?</p>
                    <a href="query.htmL"><button type="button" class="btn btn-primary" style="justify-self: center;">Ask a Question</button></a>
                </div>
            </div>
        </div>
        </div>