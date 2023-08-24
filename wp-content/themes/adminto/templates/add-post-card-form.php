<form id="submit_pacient_visit">
    <input type="hidden" name="action" value="add_patient_visit">
    <div class="m-b-0">
        <div class="form-group row clearfix">
            <label class="col-md-3 control-label " for="visit_date">Дата записи: </label>
            <div class="col-md-9">
                <input class="form-control" id="visit_date" name="visit_date" type="date">
            </div>
        </div>
        <div class="form-group row clearfix">
            <label class="col-md-3 control-label " for="doctor_name">Врач: </label>
            <div class="col-md-9">
                <select class="form-control" id="doctor_name" name="doctor_name">
                    <?php
                    $users = get_users();
                    foreach ($users as $user) {
                        $user_selected = get_post_meta($post->ID, 'doctor_name', 1); ?>
                        <option value="<?= $user->display_name; ?>"><?= $user->display_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row clearfix">
            <label class="col-md-3 control-label " for="patient_name">Пациент: </label>
            <div class="col-md-9">
                <input class="form-control" id="patient_name" name="patient_name" type="text" value="<?= the_title() ?>">
                <input hidden class="form-control" id="patient_slug" name="patient_slug" type="text" value="<?= get_post_field( 'post_name' ); ?>">
            </div>
        </div>
        <div class="form-group row clearfix">
            <label class="col-md-3 control-label">Тип приема: </label>
            <div class="col-md-9 custom-radio">
                <?php
                $args = array(
                    'taxonomy' => 'visit_templates_name',
                    'orderby' => 'ID',
                    'order' => 'ASC',
                    'hide_empty' => false,
                    'parent' => 0,
                );
                $parent_categories = get_terms( $args );
                ?>
                <?php foreach ($parent_categories as $category) { ?>
                    <label for="reception_type_<?= $category->slug; ?>"><?= $category->name; ?></label><input type="radio" name="reception_type" value="<?= $category->term_id; ?>" id="reception_type_<?= $category->slug; ?>" />
                <?php } ?>
            </div>
        </div>
        <?php foreach ($parent_categories as $category) { ?>
        <div class="reception_type_tab" id="reception_type_<?= $category->slug; ?>_text">
            <?php
            $args_childs = array(
                'taxonomy' => 'visit_templates_name',
                'child_of' => $category->term_id,
                'hide_empty' => false,
                'orderby' => 'ID',
                'order' => 'ASC',
            );
            $childs_categories = get_terms( $args_childs );
            foreach ($childs_categories as $child_category) { ?>
                <div class="form-group row clearfix">
                    <label class="col-md-3 control-label"><?= $child_category->name ?>: </label>
                    <div class="col-md-9">
                        <?php
                        $diagnosis = get_posts(array(
                            'post_type' => 'visit_templates',
                            'posts_per_page' => -1,
                            'orderby' => 'ID',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'visit_templates_name',
                                    'field'    => 'slug',
                                    'terms' => $child_category->slug,
                                )
                            )
                        ));
                        $child_category_name = 'visit_templates_' . str_replace('-', '_', $child_category->slug);
                        ?>
                        <select multiple="multiple" class="form-control multi-select" name="<?= $child_category_name ?>[]" id="<?= $child_category_name ?>" data-plugin="multiselect">
                        <!-- select class="control" name="<?= $child_category_name ?>" id="<?= $child_category_name ?>" -->
                            <?php foreach ($diagnosis as $diagnose) { ?>
                                <option value="<?= $diagnose->post_title; ?>"><?= $diagnose->post_title; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <div class="col-12 submit_pacient_block">
        <button class="btn btn-primary waves-effect w-md waves-light m-b-5" id="submit_visit_button">Добавить запись</button>
    </div>
</form>