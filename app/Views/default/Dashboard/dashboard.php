<?= $this->extend('template/layout') ?>
<?= $this->section('content') ?>

<?= $this->section('extra-css') ?>
<style>
    .overview-card {
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        padding: 1.5rem;
        background-color: #f8f9fa;
    }

    .overview-header {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .stat-card {
        background-color: white;
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        padding: 1.5rem;
        text-align: center;
    }

    .stat-card h3 {
        margin-bottom: 0.5rem;
    }

    .stat-card h2 {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .offline-badge {
        display: inline-block;
        background-color: #f8f9fa;
        border-radius: 50%;
        width: 10px;
        height: 10px;
    }
</style>
<?= $this->endSection() ?>

<?php
$user = auth()->user();
?>
<section class="overview">
    <div class="d-flex justify-content-between overview-heading">
        <div class="d-flex align-items-center">
            <h1 class="overview-heading__title mb-0">Hi <?= $user->first_name ?>, Welcome!</h1>
        </div>
        <div class="d-flex align-items-center">

            <div class="filter-daterange overview-daterange">
                <div class="filter-daterange__fieldparent">
                    <div class="filter-daterange__label"><span>Period: <span class="js__filter-daterange"> Last 30
                                Days</span></span></div>
                    <div class="filter-daterange__inputwrap js__fdaterange-main-input-wrapper">
                        <div class="filter-daterange__icon">
                            <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.375 8.25H1.625M13 1.25V4.75M6 1.25V4.75M5.825 18.75H13.175C14.6451 18.75 15.3802 18.75 15.9417 18.4639C16.4356 18.2122 16.8372 17.8106 17.0889 17.3167C17.375 16.7552 17.375 16.0201 17.375 14.55V7.2C17.375 5.72986 17.375 4.99479 17.0889 4.43327C16.8372 3.93935 16.4356 3.53778 15.9417 3.28611C15.3802 3 14.6451 3 13.175 3H5.825C4.35486 3 3.61979 3 3.05827 3.28611C2.56435 3.53778 2.16278 3.93935 1.91111 4.43327C1.625 4.99479 1.625 5.72986 1.625 7.2V14.55C1.625 16.0201 1.625 16.7552 1.91111 17.3167C2.16278 17.8106 2.56435 18.2122 3.05827 18.4639C3.61979 18.75 4.35486 18.75 5.825 18.75Z"
                                    stroke="#BDC4D1" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <input id="overviewDateRange" type="text" placeholder="" value="11-10-2024 to 10-11-2024" name="date"
                            autocomplete="off" readonly class="filter-daterange__input js__fdaterange-input" data-popup data-needlock>
                        <input id="overviewDateRange_custom_range" type="text" name="custom_range" autocomplete="off"
                            class="filter-daterange__custom-range-input js__filter-daterange__custom">
                        <div class="filter-daterange__arrow js__fdaterange-arrow">
                            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.75 1.67969L6.5 6.42969L11.25 1.67969" stroke="#131316" stroke-width="1.57895"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <input id="overviewDateRange_start" type="hidden" name="start_date" autocomplete="off"
                            class="filter-daterange__startdate">
                        <input id="overviewDateRange_end" type="hidden" name="end_date" autocomplete="off"
                            class="filter-daterange__enddate">
                    </div>
                </div>

                <div class="filter-daterange__list">
                    <div class="filter-daterange__list-item js__fdaterange-list-item" data-value="last_30_day">Last 30 days</div>
                    <div class="filter-daterange__list-item js__fdaterange-list-item" data-value="last_year">Last year</div>
                    <div class="filter-daterange__list-item js__fdaterange-list-item" data-value="month_to_date">Month-to-date
                    </div>
                    <div class="filter-daterange__list-item js__fdaterange-list-item" data-value="year_to_date">Year-to-date</div>
                    <div class="filter-daterange__list-item js__fdaterange-custom-range">Custom range
                        <div class="filter-daterange__list-item-arrow">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.49121 1.3125L7.17682 6.99811L1.49121 12.6837" stroke="#148BDF" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?= $this->setData(['widgets_data' => $widgets_data])->include('Dashboard/_widgets') ?>

    <section class="overview-section__cases">
        <div class="mb-3">
            <h2 class="overview-heading__title">Recent Cases</h2>
        </div>
        <div class="d-flex align-items-center justify-content-between cases-body-head">
            <ul class="nav nav-tabs mb-0" id="tab" role="tablist">

                <?php
                $tabs = [
                    [
                        'id' => 'bodyInjury',
                        'title' => 'Body Injury',
                    ],
                    [
                        'id' => 'disabilityClaim',
                        'title' => 'Disability Claim'
                    ],
                    [
                        'id' => 'medicalMalpractice',
                        'title' => 'Medical Malpractice'
                    ],
                    [
                        'id' => 'workersCompensation',
                        'title' => "Workers' Compensation"
                    ]
                ];

                foreach ($tabs as $key => $tab):
                    $is_active = (!empty($filter_data['current_tab']) && $filter_data['current_tab'] == $tab['id']) || (empty($filter_data['current_tab']) && $key == 0);
                    if ($is_active):
                ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="<?= $tab['id'] ?>-tab" data-bs-toggle="tab"
                                data-bs-target="#<?= $tab['id'] ?>" type="button" role="tab"
                                aria-controls="<?= $tab['id'] ?>" aria-selected="true"><?= $tab['title'] ?></button>
                        </li>
                    <?php else: ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="<?= $tab['id'] ?>-tab" data-bs-toggle="tab"
                                data-bs-target="#<?= $tab['id'] ?>" type="button" role="tab"
                                aria-controls="<?= $tab['id'] ?>" aria-selected="false"><?= $tab['title'] ?></button>
                        </li>
                <?php endif;
                endforeach; ?>

            </ul>

            <button class="btn btn-primary "
                type="button"
                aria-label="new Report"
                data-bs-toggle="modal"
                data-bs-target="#report-type">
                <svg class="icon icon-plus ">
                    <use href="/assets/themes/default/icon/icons/icons.svg#plus" />
                </svg>
                new Report
            </button>

        </div>

        <div class="tab-content" id="OverviewResentCasesTabContent">
            <?= $this->setData(
                [
                    'bodyInjuryOrders' => $bodyInjuryOrders,
                    'disabilityClaimOrders' => $disabilityClaimOrders,
                    'medicalMalpracticeOrders' => $medicalMalpracticeOrders,
                    'workersCompensationOrders' => $workersCompensationOrders,
                ]
            )->include('parts/cases/cases_tabs') ?>
        </div>

        <div class="row mt-3">
            <div class="col"><a href="/orders/cases" class="btn btn-link overview__link-view-all">View All Cases</a></div>
        </div>
    </section>
</section>

<?= $this->section('offcanvas') ?>
<div id="SectionOffcanvas">
    <?= $this->setData(
        [
            'bodyInjuryOrders' => $bodyInjuryOrders,
            'disabilityClaimOrders' => $disabilityClaimOrders,
            'medicalMalpracticeOrders' => $medicalMalpracticeOrders,
            'workersCompensationOrders' => $workersCompensationOrders,
        ]
    )->include('parts/cases/section_offcanvas') ?>
</div>
<?= $this->endSection() ?>

<?= $this->include('parts/modals/report-type_modal') ?>

<?= $this->section('extra-js') ?>
<?= $this->endSection() ?>

<?= $this->endSection() ?>