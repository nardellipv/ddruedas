<div class="page-section" style="background: rgba(36, 41, 49, 1); padding-top:33px;-webkit-box-shadow: 0 0 5px rgba(0,0,0,.4), inset 1px 2px rgba(255,255,255,.3);-moz-box-shadow: 0 0 5px rgba(0,0,0,.4), inset 1px 2px rgba(255,255,255,.3);box-shadow: 0 0 5px rgba(0,0,0,.4), inset 0px 2px rgba(255,255,255,.3);border: solid 1px #242931;margin-bottom:110px;">
    <div class="container">
        <div class="row">
            <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <!--Element Section Start-->
                    <div class="main-search">
                        <form>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="search-input"> <i class="icon-search2"></i>
                                    <input type="text" placeholder="Search by Keyword" />
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                <div class="select-dropdown">
                                    <select class="chosen-select">
                                        <option value="" selected="selected">Select Make</option>
                                        <option value="Alfa Romeo">Alfa Romeo</option>
                                        <option value="Alpine">Alpine</option>
                                        <option value="Aston Martin">Aston Martin</option>
                                        <option value="Audi">Audi</option>
                                        <option value="Bently">Bently</option>
                                        <option value="BMW">BMW</option>
                                        <option value="Bugatti">Bugatti</option>
                                        <option value="Ferrari">Ferrari</option>
                                        <option value="Fiat">Fiat</option>
                                        <option value="Lamborghini">Lamborghini</option>
                                        <option value="Lancia">Lancia</option>
                                        <option value="Land Rover">Land Rover</option>
                                        <option value="Maserati">Maserati</option>
                                        <option value="McLaren">McLaren</option>
                                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                                        <option value="Mini">Mini</option>
                                        <option value="Opel">Opel</option>
                                        <option value="Peugeot">Peugeot</option>
                                        <option value="Porsche">Porsche</option>
                                        <option value="Renault">Renault</option>
                                        <option value="Rolls-Royce">Rolls-Royce</option>
                                        <option value="Vauxhall">Vauxhall</option>
                                        <option value="Volkswagen">Volkswagen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                <div class="select-dropdown">
                                    <select  class="chosen-select">
                                        <option selected="selected">Select Type</option>
                                        <option value="Vehicles">Vehicles</option>
                                        <option value="Motors">Motors</option>
                                        <option value="Cars and Races">Cars and Races</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                <!--    <div class="select-location">
                            <input type="text" placeholder="Select Location" />
                            <a href="#"><i class="icon-hair-cross"></i></a>
                        </div>-->
                                <div class="select-location">
                                    <div class="select-location" id="cs-top-select-holder">
                                        <div class="cs_searchbox_div">
                                            <input type="text" name="cs_" class="form-control cs_search_location_field" placeholder="All Locations" autocomplete="off">
                                            <input type="hidden" value="" name="location" class="search_keyword">
                                            <div class="cs_location_autocomplete" style="width: 260px; left: 1042.5px; top: 751px; display: none;"></div>
                                        </div>
                                        <a class="location-btn pop" href="javascript:void(0);" id="popup"><i class="icon-target3"></i></a>
                                        <div class="select-popup" id="popup1"> <a id="cs_close" class="cs-location-close-popup"><i class="cs-color icon-times"></i></a>
                                            <p>Show With in</p>
                                            <div class="slider slider-horizontal">
                                                <div class="slider-track">
                                                    <div class="slider-track-low" style="left: 0px; width: 0%;"></div>
                                                    <div class="slider-selection" style="left: 0%; width: 100%;"></div>
                                                    <div class="slider-track-high" style="right: 0px; width: 0%;"></div>
                                                    <div class="slider-handle min-slider-handle round" style="left: 100%;" tabindex="0"></div>
                                                    <div class="slider-handle max-slider-handle round hide" style="left: 0%;" tabindex="0"></div>
                                                </div>
                                                <div class="tooltip tooltip-main top" style="left: 100%; margin-left: 0px;">
                                                    <div class="tooltip-arrow"></div>
                                                    <div class="tooltip-inner">500</div>
                                                </div>
                                                <div class="tooltip tooltip-min top" style="display: none;">
                                                    <div class="tooltip-arrow"></div>
                                                    <div class="tooltip-inner"></div>
                                                </div>
                                                <div class="tooltip tooltip-max top" style="display: none;">
                                                    <div class="tooltip-arrow"></div>
                                                    <div class="tooltip-inner"></div>
                                                </div>
                                            </div>
                                            <input type="text" data-slider-value="200" data-slider-step="20" data-slider-max="500" data-slider-min="0" name="radius" id="ex6392375604" style="display: none;" data-value="500" value="500">
                                            <span id="ex6CurrentSliderValLabel_job"><span id="ex6SliderVal392375604">500</span>Miles</span>
                                            <p class="my-location">of <i class="cs-color icon-location-arrow"></i><a onClick="cs_get_location(this)" class="cs-color">My location</a></p>
                                        </div>
                                    </div>
                                    <input type="text" name="cs_" class="cs-geo-location form-control txt-field geo-search-location" style="display:none;" onChange="this.form.submit()">
                                    <div style="display:none;" class="cs-undo-select"> <i class="icon-times"></i> </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12">
                                <div class="search-btn">
                                    <input type="button" value="submit" class="cs-bgcolor">
                                    <label><a href="#">ADVANCE SEARCH</a></label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Element Section End-->
                </div>
            </div>
        </div>
    </div>
</div>