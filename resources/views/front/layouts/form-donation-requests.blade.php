
    <!--inside-article-->
    <div class="all-requests">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('site.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('site.donationrequests') }}</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>{{ __('site.donationrequests') }}</h2>
                </div>
                <div class="content">
                    <form class="row filter">
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected="" disabled="">{{ __('site.choosebloodtype') }}</option>
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
                                        <option selected="" disabled="">{{ __('site.choosecity') }}</option>
                                        <option>{{ __('site.elmansoura') }}</option>
                                        <option>{{ __('site.cairo') }}</option>
                                        <option>{{ __('site.alex') }}</option>
                                        <option>{{ __('site.sohag') }}</option>
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
                                <li><span>{{ __('site.city') }}:</span> {{ __('site.elmansoura') }}</li>
                            </ul>
                            <a href="#">{{ __('site.details') }}</a>
                        </div>
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">A+</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> {{ __('site.elmansoura') }}</li>
                            </ul>
                            <a href="#">{{ __('site.details') }}</a>
                        </div>
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">AB+</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> {{ __('site.elmansoura') }}</li>
                            </ul>
                            <a href="#">{{ __('site.details') }}</a>
                        </div>
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">O-</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> {{ __('site.elmansoura') }}</li>
                            </ul>
                            <a href="#">{{ __('site.details') }}</a>
                        </div>
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">B+</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> {{ __('site.elmansoura') }}</li>
                            </ul>
                            <a href="#">{{ __('site.details') }}</a>
                        </div>
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">A+</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> {{ __('site.elmansoura') }}</li>
                            </ul>
                            <a href="#">{{ __('site.details') }}</a>
                        </div>
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">AB+</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> {{ __('site.elmansoura') }}</li>
                            </ul>
                            <a href="#">{{ __('site.details') }}</a>
                        </div>
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">O-</h2>
                            </div>
                            <ul>
                                <li><span>{{ __('site.patientname') }}:</span> احمد محمد احمد</li>
                                <li><span>{{ __('site.hospital') }}:</span> القصر العينى</li>
                                <li><span>{{ __('site.city') }}:</span> {{ __('site.elmansoura') }}</li>
                            </ul>
                            <a href="#">{{ __('site.details') }}</a>
                        </div>
                    </div>
                    <div class="pages">
                        <nav aria-label="Page navigation example" dir="ltr">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
