
@inject('clients','App\Models\Client' )
@inject('donation','App\Models\DonationRequest' )
@inject('notification','App\Models\Notification' )

<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Blood Bank</h3>
            </div>
        </div> <!--end::Row-->
    </div> <!--end::Container-->
</div>
<div class="app-content"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>                  <div class="info-box-content">
                    <span class="info-box-text">Clients</span>
                    <span class="info-box-number">{{ $clients->count() }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
        </div> <!--end::Row-->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>                  <div class="info-box-content">
                    <span class="info-box-text">Notification</span>
                    <span class="info-box-number">{{ $notification->count() }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
        </div> <!--end::Row-->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>                  <div class="info-box-content">
                    <span class="info-box-text">Donation Requests</span>
                    <span class="info-box-number">{{ $donation->count() }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
        </div> <!--end::Row-->
    </div> <!--end::Container-->
</div> <!--end::App Content-->

