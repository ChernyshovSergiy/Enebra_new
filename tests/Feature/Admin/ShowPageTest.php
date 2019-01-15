<?php

namespace Tests\Feature\Admin;

use Illuminate\Support\Facades\Lang;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPageTest extends TestCase
{
    /** @test */
    public function admin_route_dashboard(): void
    {
        $response = $this->get('admin');
        $response->assertSee(Lang::get('admin.dashboard'));
    }

    /** @test */
    public function subscribers_route_index(): void
    {
        $response = $this->get('admin/subscribers');
        $response->assertSee(Lang::get('admin.listing_subscribers'));
    }

    /** @test */
    public function subscribers_route_create(): void
    {
        $response = $this->get('admin/subscribers/create');
        $response->assertSee(Lang::get('admin.add_subscriber'));
    }

    /** @test */
    public function what_to_do_points_route_index(): void
    {
        $response = $this->get('admin/what_to_do_points');
        $response->assertSee(Lang::get('admin.listing_points'));
    }

    /** @test */
    public function what_to_do_points_route_create(): void
    {
        $response = $this->get('admin/what_to_do_points/create');
        $response->assertSee(Lang::get('admin.add_point'));
    }

    /** @test */
    public function what_to_do_points_route_edit(): void
    {
        $response = $this->get('admin/what_to_do_points/1/edit');
        $response->assertSee(Lang::get('admin.edit_point'));
    }

    /** @test */
    public function terms_route_index(): void
    {
        $response = $this->get('admin/terms');
        $response->assertSee(Lang::get('admin.listing_terms'));
    }

    /** @test */
    public function terms_route_create(): void
    {
        $response = $this->get('admin/terms/create');
        $response->assertSee(Lang::get('admin.add_term'));
    }

    /** @test */
    public function terms_route_edit(): void
    {
        $response = $this->get('admin/terms/1/edit');
        $response->assertSee(Lang::get('admin.edit_term'));
    }

    /** @test */
    public function Social_link_route_index(): void
    {
        $response = $this->get('admin/social_links');
        $response->assertSee(Lang::get('admin.listing_social_links'));
    }

    /** @test */
    public function Social_link_route_create(): void
    {
        $response = $this->get('admin/social_links/create');
        $response->assertSee(Lang::get('admin.add_social_link'));
    }

    /** @test */
    public function Social_link_route_edit(): void
    {
        $response = $this->get('admin/social_links/1/edit');
        $response->assertSee(Lang::get('admin.edit_social_link'));
    }

    /** @test */
    public function purposes_route_index(): void
    {
        $response = $this->get('admin/purposes');
        $response->assertSee(Lang::get('admin.listing_goals'));
    }

    /** @test */
    public function purposes_route_create(): void
    {
        $response = $this->get('admin/purposes/create');
        $response->assertSee(Lang::get('admin.add_goal'));
    }

    /** @test */
    public function purposes_route_edit(): void
    {
        $response = $this->get('admin/purposes/1/edit');
        $response->assertSee(Lang::get('admin.edit_goal'));
    }

    /** @test */
    public function inf_menus_route_index(): void
    {
        $response = $this->get('admin/inf_menus');
        $response->assertSee(Lang::get('admin.listing_menu_points'));
    }

    /** @test */
    public function inf_menus_route_create(): void
    {
        $response = $this->get('admin/inf_menus/create');
        $response->assertSee(Lang::get('admin.add_menu_point'));
    }

    /** @test */
    public function inf_menus_route_edit(): void
    {
        $response = $this->get('admin/inf_menus/1/edit');
        $response->assertSee(Lang::get('admin.edit_menu_point'));
    }

    /** @test */
    public function languages_route_index(): void
    {
        $response = $this->get('admin/languages');
        $response->assertSee(Lang::get('admin.listing_languages'));
    }

    /** @test */
    public function languages_route_create(): void
    {
        $response = $this->get('admin/languages/create');
        $response->assertSee(Lang::get('admin.add_languages'));
    }

    /** @test */
    public function languages_route_edit(): void
    {
        $response = $this->get('admin/languages/1/edit');
        $response->assertSee(Lang::get('admin.edit_language'));
    }

    /** @test */
    public function inf_videos_route_index(): void
    {
        $response = $this->get('admin/inf_videos');
        $response->assertSee(Lang::get('admin.listing_videos'));
    }

    /** @test */
    public function inf_videos_route_create(): void
    {
        $response = $this->get('admin/inf_videos/create');
        $response->assertSee(Lang::get('admin.add_video'));
    }

    /** @test */
    public function inf_videos_route_edit(): void
    {
        $response = $this->get('admin/inf_videos/1/edit');
        $response->assertSee(Lang::get('admin.edit_video'));
    }

    /** @test */
    public function inf_video_groups_route_index(): void
    {
        $response = $this->get('admin/inf_video_groups');
        $response->assertSee(Lang::get('admin.listing_video_groups'));
    }

    /** @test */
    public function inf_video_groups_route_create(): void
    {
        $response = $this->get('admin/inf_video_groups/create');
        $response->assertSee(Lang::get('admin.add_video_group'));
    }

    /** @test */
    public function inf_video_groups_route_edit(): void
    {
        $response = $this->get('admin/inf_video_groups/1/edit');
        $response->assertSee(Lang::get('admin.edit_video_group'));
    }

    /** @test */
    public function inf_video_group_sections_route_index(): void
    {
        $response = $this->get('admin/inf_video_group_sections');
        $response->assertSee(Lang::get('admin.listing_video_group_sections'));
    }

    /** @test */
    public function inf_video_group_sections_route_create(): void
    {
        $response = $this->get('admin/inf_video_group_sections/create');
        $response->assertSee(Lang::get('admin.add_video_group_section'));
    }

    /** @test */
    public function inf_video_group_sections_route_edit(): void
    {
        $response = $this->get('admin/inf_video_group_sections/1/edit');
        $response->assertSee(Lang::get('admin.edit_video_group_section'));
    }

    /** @test */
    public function inf_plan_phases_route_index(): void
    {
        $response = $this->get('admin/inf_plan_phases');
        $response->assertSee(Lang::get('admin.listing_plan_phases'));
    }

    /** @test */
    public function inf_plan_phases_route_create(): void
    {
        $response = $this->get('admin/inf_plan_phases/create');
        $response->assertSee(Lang::get('admin.add_plan_phase'));
    }

    /** @test */
    public function inf_plan_phases_route_edit(): void
    {
        $response = $this->get('admin/inf_plan_phases/1/edit');
        $response->assertSee(Lang::get('admin.edit_plan_phase'));
    }

    /** @test */
    public function inf_plan_phase_sections_route_index(): void
    {
        $response = $this->get('admin/inf_plan_phase_sections');
        $response->assertSee(Lang::get('admin.listing_plan_phases_sec'));
    }

    /** @test */
    public function inf_plan_phase_sections_route_create(): void
    {
        $response = $this->get('admin/inf_plan_phase_sections/create');
        $response->assertSee(Lang::get('admin.add_plan_phase_sec'));
    }

    /** @test */
    public function inf_plan_phase_sections_route_edit(): void
    {
        $response = $this->get('admin/inf_plan_phase_sections/1/edit');
        $response->assertSee(Lang::get('admin.edit_plan_phase_sec'));
    }

    /** @test */
    public function inf_plan_phase_section_points_route_index(): void
    {
        $response = $this->get('admin/inf_plan_phase_section_points');
        $response->assertSee(Lang::get('admin.listing_plan_phases_sec_point'));
    }

    /** @test */
    public function inf_plan_phase_section_points_route_create(): void
    {
        $response = $this->get('admin/inf_plan_phase_section_points/create');
        $response->assertSee(Lang::get('admin.add_plan_phase_sec_point'));
    }

    /** @test */
    public function inf_plan_phase_section_points_route_edit(): void
    {
        $response = $this->get('admin/inf_plan_phase_section_points/1/edit');
        $response->assertSee(Lang::get('admin.edit_plan_phase_sec_point'));
    }

    /** @test */
    public function inf_pages_route_index(): void
    {
        $response = $this->get('admin/inf_pages');
        $response->assertSee(Lang::get('admin.listing_pages'));
    }

    /** @test */
    public function inf_pages_route_create(): void
    {
        $response = $this->get('admin/inf_pages/create');
        $response->assertSee(Lang::get('admin.add_page'));
    }

    /** @test */
    public function inf_pages_route_edit(): void
    {
        $response = $this->get('admin/inf_pages/1/edit');
        $response->assertSee(Lang::get('admin.edit_page'));
    }

    /** @test */
    public function inf_introductions_route_index(): void
    {
        $response = $this->get('admin/introductions');
        $response->assertSee(Lang::get('admin.listing_introduction'));
    }

    /** @test */
    public function inf_introductions_route_create(): void
    {
        $response = $this->get('admin/introductions/create');
        $response->assertSee(Lang::get('admin.add_introduction'));
    }

    /** @test */
    public function inf_introductions_route_edit(): void
    {
        $response = $this->get('admin/introductions/1/edit');
        $response->assertSee(Lang::get('admin.edit_introduction'));
    }

    /** @test */
    public function inf_int_points_route_index(): void
    {
        $response = $this->get('admin/introduction_points');
        $response->assertSee(Lang::get('admin.listing_introduction_points'));
    }

    /** @test */
    public function inf_int_points_route_create(): void
    {
        $response = $this->get('admin/introduction_points/create');
        $response->assertSee(Lang::get('admin.add_introduction_point'));
    }

    /** @test */
    public function inf_int_points_route_edit(): void
    {
        $response = $this->get('admin/introduction_points/1/edit');
        $response->assertSee(Lang::get('admin.edit_introduction_point'));
    }

    /** @test */
    public function image_route_index(): void
    {
        $response = $this->get('admin/images');
        $response->assertSee(Lang::get('admin.listing_images'));
    }

    /** @test */
    public function image_route_create(): void
    {
        $response = $this->get('admin/images/create');
        $response->assertSee(Lang::get('admin.add_image'));
    }

    /** @test */
    public function image_route_edit(): void
    {
        $response = $this->get('admin/images/1/edit');
        $response->assertSee(Lang::get('admin.edit_image'));
    }

    /** @test */
    public function id_documents_route_index(): void
    {
        $response = $this->get('admin/id_documents');
        $response->assertSee(Lang::get('admin.listing_id_documents'));
    }

    /** @test */
    public function id_documents_route_create(): void
    {
        $response = $this->get('admin/id_documents/create');
        $response->assertSee(Lang::get('admin.add_id_document'));
    }

    /** @test */
    public function id_documents_route_edit(): void
    {
        $response = $this->get('admin/id_documents/1/edit');
        $response->assertSee(Lang::get('admin.edit_id_documents'));
    }

    /** @test */
    public function faq_questions_route_index(): void
    {
        $response = $this->get('admin/faq_questions');
        $response->assertSee(Lang::get('admin.listing_questions'));
    }

    /** @test */
    public function faq_questions_route_create(): void
    {
        $response = $this->get('admin/faq_questions/create');
        $response->assertSee(Lang::get('admin.add_question'));
    }

    /** @test */
    public function faq_questions_route_edit(): void
    {
        $response = $this->get('admin/faq_questions/1/edit');
        $response->assertSee(Lang::get('admin.edit_question'));
    }

    /** @test */
    public function faq_answers_route_index(): void
    {
        $response = $this->get('admin/faq_answers');
        $response->assertSee(Lang::get('admin.listing_answers'));
    }

    /** @test */
    public function faq_answers_route_create(): void
    {
        $response = $this->get('admin/faq_answers/create');
        $response->assertSee(Lang::get('admin.add_answer'));
    }

    /** @test */
    public function faq_answers_route_edit(): void
    {
        $response = $this->get('admin/faq_answers/1/edit');
        $response->assertSee(Lang::get('admin.edit_answer'));
    }

    /** @test */
    public function descriptions_route_index(): void
    {
        $response = $this->get('admin/descriptions');
        $response->assertSee(Lang::get('admin.listing_blocks'));
    }

    /** @test */
    public function descriptions_route_create(): void
    {
        $response = $this->get('admin/descriptions/create');
        $response->assertSee(Lang::get('admin.add_text_block'));
    }

    /** @test */
    public function descriptions_route_edit(): void
    {
        $response = $this->get('admin/descriptions/1/edit');
        $response->assertSee(Lang::get('admin.edit_text_block'));
    }

    /** @test */
    public function desc_blocks_route_index(): void
    {
        $response = $this->get('admin/desc_blocks');
        $response->assertSee(Lang::get('admin.listing_des_blocks'));
    }

    /** @test */
    public function desc_blocks_route_create(): void
    {
        $response = $this->get('admin/desc_blocks/create');
        $response->assertSee(Lang::get('admin.add_des_block'));
    }

    /** @test */
    public function desc_blocks_route_edit(): void
    {
        $response = $this->get('admin/desc_blocks/1/edit');
        $response->assertSee(Lang::get('admin.edit_des_block'));
    }

    /** @test */
    public function countries_route_index(): void
    {
        $response = $this->get('admin/countries');
        $response->assertSee(Lang::get('admin.listing_countries'));
    }

    /** @test */
    public function countries_route_create(): void
    {
        $response = $this->get('admin/countries/create');
        $response->assertSee(Lang::get('admin.add_country'));
    }

    /** @test */
    public function countries_route_edit(): void
    {
        $response = $this->get('admin/countries/1/edit');
        $response->assertSee(Lang::get('admin.edit_country'));
    }

    /** @test */
    public function constitution_sections_route_index(): void
    {
        $response = $this->get('admin/const_sections');
        $response->assertSee(Lang::get('admin.listing_sections'));
    }

    /** @test */
    public function constitution_sections_route_create(): void
    {
        $response = $this->get('admin/const_sections/create');
        $response->assertSee(Lang::get('admin.add_section'));
    }

    /** @test */
    public function constitution_sections_route_edit(): void
    {
        $response = $this->get('admin/const_sections/1/edit');
        $response->assertSee(Lang::get('admin.edit_section'));
    }

    /** @test */
    public function constitution_article_route_index(): void
    {
        $response = $this->get('admin/const_articles');
        $response->assertSee(Lang::get('admin.listing_articles'));
    }

    /** @test */
    public function constitution_article_route_create(): void
    {
        $response = $this->get('admin/const_articles/create');
        $response->assertSee(Lang::get('admin.add_article'));
    }

    /** @test */
    public function constitution_article_route_edit(): void
    {
        $response = $this->get('admin/const_articles/1/edit');
        $response->assertSee(Lang::get('admin.edit_article'));
    }

    /** @test */
    public function image_categories_route_index(): void
    {
        $response = $this->get('admin/image_categories');
        $response->assertSee(Lang::get('admin.listing_image_category'));
    }

    /** @test */
    public function image_categories_route_create(): void
    {
        $response = $this->get('admin/image_categories/create');
        $response->assertSee(Lang::get('admin.create_new_image_category'));
    }

    /** @test */
    public function image_categories_route_edit(): void
    {
        $response = $this->get('admin/image_categories/1/edit');
        $response->assertSee(Lang::get('admin.edit_image_category'));
    }
}
