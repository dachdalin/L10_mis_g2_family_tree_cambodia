@extends('layouts.layout')


@section('content')
<style>
.certificate-tr td{
    border: none !important;
    padding: 0 !important;
}
.w-40{
    width: 40% !important;
}
.w-10{
    width: 10% !important;
}
.w-50{
    width: 50% !important;
}
.w-25{
    width: 25% !important;
}
</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
           <h3 class="card-title">People Certificate</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="certificate-header">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <div class="certificate-logo border">
                                <img src="{{ asset('images/logo.png') }}" class="img-fluid" width="50" alt="Responsive image">
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            <h5 class="font-weight-bold">ព្រះរាជាណាចក្រកម្ពុជា</h5>
                            <h5 class="font-weight-bold">ជាតិ សាសនា ព្រះមហាក្សត្រ</h5>
                            <h5>symbole of cambodia</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table">
                                <tr  class="mb-0 certificate-tr">
                                    <td class="text-left">ខេត្ត ក្រុង​ ....................</td>
                                    <td></td>
                                    <td class="text-right">លេខ​.............................</td>
                                </tr>
                                <tr class="mb-0  certificate-tr">
                                    <td class="text-left">ស្រុក ខណ្ឌ​ ....................</td>
                                    <td></td>
                                    <td class="text-right">សៀវភៅបញ្ជាក់កំណើតលេខ...........</td>
                                </tr>
                                <tr class="mb-0 certificate-tr">
                                    <td class="text-left">ឃុំ សង្កាត់​ ....................</td>
                                    <td></td>
                                    <td class="text-right">ឆ្នាំ​....................</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 text-center">
                            <h3 class="font-weight-bold">សំបុត្របញ្ជាក់កំណើត</h3>
                        </div>
                    </div>
                </div>
                <div class="certificate-body">
                    <table style="border: 3.5px solid #000;" class="table table-bordered">
                        <tr>
                            <th class="w-40">ឈ្មោះ</th>
                            <td class="w-50"></td>
                            <td style="border-bottom: none !important;" class="w-10 text-center">ភេទ</td>
                        </tr>
                        <tr>
                            <th class="w-40">ឈ្មោះ</th>
                            <td class="w-50"></td>
                            <td style="border-top: none !important;" class="w-10"></td>
                        </tr>
                        <tr>
                            <th class="w-40">ឈ្មោះ</th>
                            <td colspan="2"></td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <th class="w-40">ឈ្មោះ</th>
                            <td colspan="2"></td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <th>សញ្ជាតិ</th>
                            <td colspan="2"></td>
                            {{-- <td>ភេទ</td> --}}
                        </tr>
                        <tr>
                            <th>ថ្ងៃ ខែ ឆ្នាំកំណើត</th>
                            <td colspan="2"></td>
                            {{-- <td>ភេទ</td> --}}
                        </tr>
                        <tr>
                            <th class="text-center">ទីកន្លែងកំណើត</th>
                            <td colspan="2"></td>
                            {{-- <td>ភេទ</td> --}}
                        </tr>
                        <tr>
                            <th class="text-center">ភូមិ  ឃុំ​ សង្កាត់​  ស្រុក ខណ្ឌ  ខេត្ត ក្រុង  ប្រទេស</th>
                            <td colspan="2"></td>
                            {{-- <td>ភេទ</td> --}}
                        </tr>
                    </table>
                    <table style="margin-top: -16px;border-left: 3.5px solid #000;border-right: 3.5px solid #000;border-bottom: 3.5px solid #000;" class="table table-bordered">
                        <tr>
                            <th class="text-center w-40">ឳពុក ម្ដាយ</th>
                            <td class="text-center">ឳពុក</td>
                            <td class="text-center">ម្ដាយ</td>
                        </tr>
                        <tr>
                            <th>នាមត្រកូល និងនាមខ្លួន</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>ជាអក្សរឡាតាំង</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>សញ្ជាតិ</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>ថ្ងៃ ខែ ឆ្នាំកំណើត</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="text-center">ទីកន្លែងកំណើត</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="text-center">ភូមិ  ឃុំ​ សង្កាត់​  ស្រុក ខណ្ឌ  ខេត្ត ក្រុង  ប្រទេស</th>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="certificate-footer my-5">
                    <div class="row mb-5">
                        <div class="col-12">
                            <table class="table mb-5">
                                <tr class="certificate-tr">
                                    <td class="w-25"></td>
                                    <td class="w-25"></td>
                                    <td class="w-25"></td>
                                    <td class="text-center w-25 font-weight-bold">ធ្វើនៅ...............ថ្ងៃទី.........ខែ............ឆ្នាំ២០២...</td>
                                </tr>
                                <tr class="certificate-tr">
                                    <td class="w-25"></td>
                                    <td class="w-25"></td>
                                    <td class="w-25"></td>
                                    <td class="text-center w-25 font-weight-bold">មន្ត្រីអត្រានុកូលដ្ឋាន</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





