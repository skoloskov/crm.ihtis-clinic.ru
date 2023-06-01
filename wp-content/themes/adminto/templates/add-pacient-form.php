<form>
    <div id="basicwizard" class=" pull-in">
        <ul class="nav nav-tabs nav-justified navtab-wizard">
            <li class="nav-item"><a href="#tab1" data-toggle="tab" class="nav-link show active">Обязательные</a></li>
            <li class="nav-item"><a href="#tab2" data-toggle="tab" class="nav-link show">Дополнительные</a></li>
            <li class="nav-item"><a href="#tab3" data-toggle="tab" class="nav-link show">Доверенное лицо</a></li>
        </ul>
        <div class="tab-content b-0 mb-0">
            <div class="tab-pane m-t-10 fade active show" id="tab1">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row clearfix">
                            <label class="col-md-3 control-label" for="FIO">ФИО*</label>
                            <div class="col-md-9">
                                <input class="form-control required" required id="FIO" name="FIO" type="text" placeholder="Иванов Иван Иванович" >
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <label class="col-md-3 control-label" for="gender">Пол*</label>
                            <div class="col-md-9 pacient_form_gener_group">
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="inlineRadio1" value="Мужской" name="gender" checked="">
                                    <label for="inlineRadio1"> Мужской </label>
                                </div>
                                <div class="radio form-check-inline">
                                    <input type="radio" id="inlineRadio2" value="Женский" name="gender">
                                    <label for="inlineRadio2"> Женский </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <label class="control-label col-md-3">Дата рождения*</label>
                            <div class="col-md-9 input-group">
                                <input type="text" name="birth_date" class="form-control required" required placeholder="mm/dd/yyyy" id="datepicker">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <label class="col-md-3 control-label" for="phone">Телефон*</label>
                            <div class="col-md-9">
                                <input type="text" id="phone" name="phone" required placeholder="+7(999) 999-9999" data-mask="+7(999) 999-9999" class="form-control required">
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <label class="col-md-3 control-label" for="adress">Адрес проживания*</label>
                            <div class="col-md-9">
                                <input class="form-control required" required id="adress" name="adress" type="text" placeholder="Индекс, Область, Город, Улица, Дом, Квартира">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane m-t-10 fade" id="tab2">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row clearfix">
                            <label class="col-lg-3 control-label" for="ps_number">Серия и номер паспорта</label>
                            <div class="col-lg-9">
                                <input id="ps_number" name="ps_number" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <label class="col-lg-3 control-label" for="ps_organization">Кем выдан</label>
                            <div class="col-lg-9">
                                <input id="ps_organization" name="ps_organization" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <label class="control-label col-md-3">Дата выдачи</label>
                            <div class="col-md-9 input-group">
                                <input type="text" name="ps_date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <label class="col-lg-3 control-label" for="ps_adress">Адрес регистрации</label>
                            <div class="col-lg-9">
                                <input id="ps_adress" name="ps_adress" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <label class="col-lg-3 control-label" for="snils">СНИЛС</label>
                            <div class="col-lg-9">
                                <input id="snils" name="snils" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <label class="col-lg-3 control-label" for="oms_dms">Номер ОМС/ДМС</label>
                            <div class="col-lg-9">
                                <input id="oms_dms" name="oms_dms" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane m-t-10 fade" id="tab3">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row clearfix">
                            <div class="col-lg-12">
                                <div class="form-group row clearfix">
                                    <label class="col-md-3 control-label " for="fio_dl">ФИО доверенного лица</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="fio_dl" name="fio_dl" type="text">
                                    </div>
                                </div>
                                <div class="form-group row clearfix">
                                    <label class="col-md-3 control-label" for="phone_dl">Телефон доверенного лица</label>
                                    <div class="col-md-9">
                                        <input type="text" id="phone_dl" name="phone_dl" placeholder="+7(999) 999-9999" data-mask="+7(999) 999-9999" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 submit_pacient_block">
                <button type="submit" class="btn btn-primary waves-effect w-md waves-light m-b-5" id="submit_pacient">Добавить пациента</button>
            </div>
            <ul class="list-inline wizard mb-0">
                <li class="previous list-inline-item disabled"><a href="#" class="btn btn-primary waves-effect waves-light">Назад</a>
                </li>
                <li class="next list-inline-item float-right">
                    <a href="#" class="btn btn-primary waves-effect waves-light">Вперед</a>
                </li>
            </ul>
        </div>
    </div>
</form>