<?php $i = isset($i) ? $i : 1; ?>

<!-- LOGO -->

<?php $arr_LOGO = getzlrs('tol_co' , 1); ?>

<div id="comm_layout_header" class="layout  none scrollToTop_pc scrollToTop_pad scrollToTop_mobile" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

	<div class="view_contents">

		<!-- LOGO start -->

		<div id="image_logo_1575606105555" class="view logo image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

			<div names="image" class="view_contents">

				<div class="logoStyle modSet">

				<a href="index.php" target="_self"><img class="imgSet" src="<?php echo getimgj($arr_LOGO['img_sl'] , '') ?>" alt="<?php echo $arr_LOGO['title'] ?>" style="width:auto; height:100%; margin-left:0px"></a>

				</div>

			</div>

		</div>

		<!-- LOGO ending -->



		<div id="dh_style_28_1578629663716" class="view style_28 dh  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

				<div names="dh" class="view_contents">

					<div id="menu" class="menu menuStyle_28">

						<div class="menuLayout">

						<!-- 手机版 start -->

							<ul class="miniMenu columnSet showmobile">

								<li class="leftBox">

									<div class="nav"></div>

									<div class="sidebar icoMenuSet"><i class="fa fa-navicon" onclick="setDhListen(&#39;style_01&#39;,this)"></i></div>

									<div class="menuScroll">

										<ul class="menuUlCopy">

											<li id="hot" class="rflex"><a class="mainMenuSet" href="index.php">

											首页</a>

											</li>

<!-- 集团概况 start -->

<?php $group_tit = getidlm('group_lm' , 33); ?>

											<li class="rflex">

												<a class="mainMenuSet" href="about.php">

											<?php echo $group_tit['title_lm'] ?></a>

<?php $group_lis = getlmrss('group_lm' , $group_tit['id_lm'] , false); ?>

											<i style="border: 1px solid #736f6f;border-radius: 5px" class="fa fa-angle-down" onclick="navSwtich(this)"></i>

												<ul class="menuUlCopy">

												<?php foreach ($group_lis as $key => $value): ?>

													<li >

														<a class="subMenuSet" href="<?php echo $value['url_lm'] ?>"><?php echo $value['title_lm'] ?></a>

													</li>

												<?php endforeach ?>

												</ul>

											</li>

											<!-- <li class="rflex"><a class="mainMenuSet" href="field.php">

											业务领域</a>

											</li> -->
											<li class="rflex"><a class="mainMenuSet" href="product.php">

											产品中心</a>

											</li>

											<li class="rflex"><a class="mainMenuSet" href="case.php">

											工程案例</a>

											</li>

											<li class="rflex"><a class="mainMenuSet" href="news.php">

											新闻动态</a>

											</li>

											<li class="rflex"><a class="mainMenuSet" href="human.php">

											人力资源</a>

											<i style="border: 1px solid #736f6f;border-radius: 5px" class="fa fa-angle-down" onclick="navSwtich(this)"></i>

												<ul class="menuUlCopy">

													<li>

														<a class="subMenuSet" href="idea.php">人才理念</a>

													</li>

													<li>

														<a class="subMenuSet" href="team.php">人员队伍</a>

													</li>

													<li>

														<a class="subMenuSet" href="train.php">员工培训</a>

													</li>

													<li>

														<a class="subMenuSet" href="job.php">人才招聘</a>

													</li>

												</ul>

											</li>

										</ul>

									</div>

								</li>

							</ul>

						<!-- 手机版 ending -->



							<!-- 电脑版 start -->

							<div class="menuUl_box columnSet dhAreaSet showpc">

								<ul class="menuUl dflex maxWidth ">

									<li <?php echo $i == 1 ? 'id="hot"' : '' ?> class="rflex isLi">

										<a class="mainMenuSet Nosub" href="index.php">

											首页

										</a>

									</li>

									<!-- 集团概况 start -->

									<li <?php echo $i == 2 ? 'id="hot"' : '' ?> class="rflex isLi">

										<a class="mainMenuSet Onsub" href="about.php">

											<?php echo $group_tit['title_lm'] ?>

											<i class="fa fa-angle-down"></i>

										</a>

										<ul class="menuUl02 subminSet">

										<?php foreach ($group_lis as $key => $value): ?>

											<li class="subMenu02 subMenuSet">

												<a href="<?php echo $value['url_lm'] ?>">

												<?php echo $value['title_lm'] ?>

												</a>

											</li>

										<?php endforeach ?>

										</ul>

									</li>

									<!-- 集团概况 ending -->

									<!-- <li <?php echo $i == 3 ? 'id="hot"' : '' ?> class="rflex isLi">

										<a class="mainMenuSet Nosub" href="field.php">

											业务领域

										</a>

									</li> -->

									<li <?php echo $i == 5 ? 'id="hot"' : '' ?> class="rflex isLi">

										<a class="mainMenuSet Nosub" href="product.php">

											产品中心
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="menuUl02 subminSet">
								<?php
									$pro = getlmrss('pro_lm','1',false);
								?>
										<?php foreach ($pro as $kpro => $vpro): ?>

											<li class="subMenu02 subMenuSet">

												<a href="product.php?id_lm=<?php echo $vpro['id_lm']?>">

												<?php echo $vpro['title_lm'] ?>

												</a>

											</li>

										<?php endforeach ?>

										</ul>
									</li>

									<li <?php echo $i == 4 ? 'id="hot"' : '' ?> class="rflex isLi">

										<a class="mainMenuSet Nosub" href="case.php">

											工程案例

										</a>

									</li>
									<li <?php echo $i == 6 ? 'id="hot"' : '' ?> class="rflex isLi">

										<a class="mainMenuSet Nosub" href="news.php">

											新闻动态

										</a>

									</li>

									<li <?php echo $i == 7 ? 'id="hot"' : '' ?> class="rflex isLi">

										<a class="mainMenuSet Onsub" href="human.php">

											人力资源

											<i class="fa fa-angle-down"></i>

										</a>

											<ul class="menuUl02 subminSet">

												<li class="subMenu02 subMenuSet">

													<a href="idea.php">

													人才理念

													</a>

												</li>

														<li class="subMenu02 subMenuSet">

													<a href="team.php">

													人员队伍

													</a>

												</li>

														<li class="subMenu02 subMenuSet">

													<a href="train.php">

													员工培训

													</a>

												</li>

														<li class="subMenu02 subMenuSet">

													<a href="job.php">

													人才招聘

													</a>

												</li>

											</ul>

										</li>

									</ul>

								<div class="subBox" style="top: 80px; height: 762px;">

									<div class="subBoxContent maxWidth">

										<div class="subItems">

											<div class="sublm">

											<!-- 集团概况 start -->

											<?php foreach ($group_lis as $key => $value): ?>

												<div>

													<p>

														<a class="subMenu02 subMenuSet" href="<?php echo $value['url_lm'] ?>"><?php echo $value['title_lm'] ?></a>

													</p>

												</div>

											<?php endforeach ?>

											<!-- 集团概况 ending -->

												<div>

													<p>

														<a class="subMenu02 subMenuSet" href="culture.php">企业文化</a>

													</p>

												</div>

												<div>

													<p>

														<a class="subMenu02 subMenuSet" href="honor.php">资质荣誉</a>

													</p>

												</div>

												<div>

													<p>

														<a class="subMenu02 subMenuSet" href="course.php">发展历程</a>

													</p>

												</div>

												<div>

													<p>

														<a class="subMenu02 subMenuSet" href="contact.php">联系我们</a>

													</p>

												</div>

											</div>

										</div>

										<div class="subItems">

											<div class="sublm">

												<div>

													<p>

														<a class="subMenu02 subMenuSet" href="idea.php">人才理念</a>

													</p>

												</div>

												<div>

													<p>

														<a class="subMenu02 subMenuSet" href="team.php">人员队伍</a>

													</p>

												</div>

												<div>

													<p>

														<a class="subMenu02 subMenuSet" href="train.php">员工培训</a>

													</p>

												</div>

												<div>

													<p>

														<a class="subMenu02 subMenuSet" href="job.php">人才招聘</a>

													</p>

												</div>

											</div>

										</div>

									</div>

								</div>

							</div>

							<!-- 电脑版 ending -->

						</div>

					</div>



				</div>

			</div>

		<!-- LOGO font start -->

		<div id="text_style_01_1588938885468" class="view style_01 text  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">

			<div names="text" class="view_contents">

				<a href="javascript:void(0);" target="" style="color:inherit" class="editor-view-extend link-type-1-3"></a>

			</div>

		</div>

		<div id="text_style_01_1588939012535" class="view style_01 text  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">

			<div names="text" class="view_contents">

				<a href="javascript:void(0);" target="" style="color:inherit" class="editor-view-extend link-type-1-3"><?php echo $arr_LOGO['f_body'] ?></a>

			</div>

		</div>

		<!-- LOGO font ending -->

	</div>

	<!-- 中英 start -->

<!-- 	<div class="British">

		<a href="EN/index.php">EN</a>

	</div> -->

	<!-- 中英 ending -->

</div>

