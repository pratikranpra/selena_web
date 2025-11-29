<?php

namespace Webkul\Shop\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Webkul\CMS\Repositories\CmsRepository;
use Webkul\Core\Repositories\ChannelRepository;

class CmsController extends Controller
{
    /**
     * CmsRepository object
     *
     * @var \Webkul\CMS\Repositories\CmsRepository
     */
    protected $cmsRepository;

    /**
     * ChannelRepository object
     *
     * @var \Webkul\Core\Repositories\ChannelRepository
     */
    protected $channelRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\CMS\Repositories\CmsRepository  $cmsRepository
     * @param  \Webkul\Core\Repositories\ChannelRepository  $channelRepository
     * @return void
     */
    public function __construct(
        CmsRepository $cmsRepository,
        ChannelRepository $channelRepository
    ) {
        $this->cmsRepository = $cmsRepository;
        $this->channelRepository = $channelRepository;
    }

    /**
     * Get all CMS pages
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            // Get current channel
            $channel = $this->channelRepository->findWhere(['hostname' => $request->getHttpHost()])->first();

            if (! $channel) {
                $channel = $this->channelRepository->first();
            }

            // Get all CMS pages for the current channel
            $pages = $this->cmsRepository->getAll($channel->id);

            $formattedPages = $pages->map(function ($page) {
                return [
                    'id' => $page->id,
                    'url_key' => $page->url_key,
                    'html_content' => $page->html_content,
                    'page_title' => $page->page_title,
                    'meta_title' => $page->meta_title,
                    'meta_description' => $page->meta_description,
                    'meta_keywords' => $page->meta_keywords,
                    'created_at' => $page->created_at,
                    'updated_at' => $page->updated_at,
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $formattedPages,
                'meta' => [
                    'total' => $pages->count(),
                    'channel' => $channel->name,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch CMS pages',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get specific CMS page by ID
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        try {
            $page = $this->cmsRepository->find($id);

            if (! $page) {
                return response()->json([
                    'success' => false,
                    'message' => 'CMS page not found'
                ], 404);
            }

            $formattedPage = [
                'id' => $page->id,
                'url_key' => $page->url_key,
                'html_content' => $page->html_content,
                'page_title' => $page->page_title,
                'meta_title' => $page->meta_title,
                'meta_description' => $page->meta_description,
                'meta_keywords' => $page->meta_keywords,
                'created_at' => $page->created_at,
                'updated_at' => $page->updated_at,
            ];

            return response()->json([
                'success' => true,
                'data' => $formattedPage
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch CMS page',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get CMS page by URL key
     *
     * @param  string  $url_key
     * @return \Illuminate\Http\JsonResponse
     */
    public function showByUrlKey($url_key): JsonResponse
    {
        try {
            $page = $this->cmsRepository->findByUrlKey($url_key);

            if (! $page) {
                return response()->json([
                    'success' => false,
                    'message' => 'CMS page not found'
                ], 404);
            }

            $formattedPage = [
                'id' => $page->id,
                'url_key' => $page->url_key,
                'html_content' => $page->html_content,
                'page_title' => $page->page_title,
                'meta_title' => $page->meta_title,
                'meta_description' => $page->meta_description,
                'meta_keywords' => $page->meta_keywords,
                'created_at' => $page->created_at,
                'updated_at' => $page->updated_at,
            ];

            return response()->json([
                'success' => true,
                'data' => $formattedPage
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch CMS page',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}