        <!--requests-->
        <div class="requests">
            <div class="container">
                <div class="head-text">
                    <h2>{{ __("site.donationrequests") }}</h2>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <form class="row filter">
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>{{ __("site.choosebloodtype") }}</option>
                                        <option>+A</option>
                                        <option>+B</option>
                                        <option>+AB</option>
                                        <option>-O</option>
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>{{ __("site.choosecity") }}</option>
                                        <option>{{ __("site.elmansoura") }}</option>
                                        <option>{{ __("site.cairo") }}</option>
                                        <option>{{ __("site.alex") }}</option>
                                        <option>{{ __("site.sohag") }}</option>
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="patients">
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">B+</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> المنصورة</li>
                            </ul>
                            <a href="inside-request.html">{{ __('site.details') }}</a>
                        </div>
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">A+</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> المنصورة</li>
                            </ul>
                            <a href="inside-request.html">{{ __('site.details') }}</a>
                        </div>
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">AB+</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> المنصورة</li>
                            </ul>
                            <a href="inside-request.html">{{ __('site.details') }}</a>
                        </div>
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">O-</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> المنصورة</li>
                            </ul>
                            <a href="inside-request.html">{{ __('site.details') }}</a>
                        </div>
                    </div>
                    <div class="more">
                        <a href="donation-requests.html">{{ __('site.more') }}</a>
                    </div>
                </div>
            </div>
        </div>
