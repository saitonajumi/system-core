<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createnew_featuresAPIRequest;
use App\Http\Requests\API\Updatenew_featuresAPIRequest;
use App\Models\new_features;
use App\Repositories\new_featuresRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class new_featuresController
 * @package App\Http\Controllers\API
 */

class new_featuresAPIController extends AppBaseController
{
    /** @var  new_featuresRepository */
    private $newFeaturesRepository;

    public function __construct(new_featuresRepository $newFeaturesRepo)
    {
        $this->newFeaturesRepository = $newFeaturesRepo;
    }

    /**
     * Display a listing of the new_features.
     * GET|HEAD /newFeatures
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $newFeatures = $this->newFeaturesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($newFeatures->toArray(), 'New Features retrieved successfully');
    }

    /**
     * Store a newly created new_features in storage.
     * POST /newFeatures
     *
     * @param Createnew_featuresAPIRequest $request
     *
     * @return Response
     */
    public function store(Createnew_featuresAPIRequest $request)
    {
        $input = $request->all();

        $newFeatures = $this->newFeaturesRepository->create($input);

        return $this->sendResponse($newFeatures->toArray(), 'New Features saved successfully');
    }

    /**
     * Display the specified new_features.
     * GET|HEAD /newFeatures/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var new_features $newFeatures */
        $newFeatures = $this->newFeaturesRepository->find($id);

        if (empty($newFeatures)) {
            return $this->sendError('New Features not found');
        }

        return $this->sendResponse($newFeatures->toArray(), 'New Features retrieved successfully');
    }

    /**
     * Update the specified new_features in storage.
     * PUT/PATCH /newFeatures/{id}
     *
     * @param int $id
     * @param Updatenew_featuresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatenew_featuresAPIRequest $request)
    {
        $input = $request->all();

        /** @var new_features $newFeatures */
        $newFeatures = $this->newFeaturesRepository->find($id);

        if (empty($newFeatures)) {
            return $this->sendError('New Features not found');
        }

        $newFeatures = $this->newFeaturesRepository->update($input, $id);

        return $this->sendResponse($newFeatures->toArray(), 'new_features updated successfully');
    }

    /**
     * Remove the specified new_features from storage.
     * DELETE /newFeatures/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var new_features $newFeatures */
        $newFeatures = $this->newFeaturesRepository->find($id);

        if (empty($newFeatures)) {
            return $this->sendError('New Features not found');
        }

        $newFeatures->delete();

        return $this->sendSuccess('New Features deleted successfully');
    }
}
