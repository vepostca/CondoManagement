<?php

namespace InnovaCondomi\Http\Controllers\Tes;

use InnovaCondomi\DataTables\Tes\TestDataTable;
use InnovaCondomi\Http\Requests\Tes;
use InnovaCondomi\Http\Requests\Tes\CreateTestRequest;
use InnovaCondomi\Http\Requests\Tes\UpdateTestRequest;
use InnovaCondomi\Repositories\Tes\TestRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;

class TestController extends AppBaseController
{
    /** @var  TestRepository */
    private $testRepository;

    public function __construct(TestRepository $testRepo)
    {
        $this->testRepository = $testRepo;
    }

    /**
     * Display a listing of the Test.
     *
     * @param TestDataTable $testDataTable
     * @return Response
     */
    public function index(TestDataTable $testDataTable)
    {
        return $testDataTable->render('tes.tests.index');
    }

    /**
     * Show the form for creating a new Test.
     *
     * @return Response
     */
    public function create()
    {
        return view('tes.tests.create');
    }

    /**
     * Store a newly created Test in storage.
     *
     * @param CreateTestRequest $request
     *
     * @return Response
     */
    public function store(CreateTestRequest $request)
    {
        $input = $request->all();

        $test = $this->testRepository->create($input);

        Flash::success('Test saved successfully.');

        return redirect(route('tes.tests.index'));
    }

    /**
     * Display the specified Test.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $test = $this->testRepository->findWithoutFail($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tes.tests.index'));
        }

        return view('tes.tests.show')->with('test', $test);
    }

    /**
     * Show the form for editing the specified Test.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $test = $this->testRepository->findWithoutFail($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tes.tests.index'));
        }

        return view('tes.tests.edit')->with('test', $test);
    }

    /**
     * Update the specified Test in storage.
     *
     * @param  int              $id
     * @param UpdateTestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestRequest $request)
    {
        $test = $this->testRepository->findWithoutFail($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tes.tests.index'));
        }

        $test = $this->testRepository->update($request->all(), $id);

        Flash::success('Test updated successfully.');

        return redirect(route('tes.tests.index'));
    }

    /**
     * Remove the specified Test from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $test = $this->testRepository->findWithoutFail($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tes.tests.index'));
        }

        $this->testRepository->delete($id);

        Flash::success('Test deleted successfully.');

        return redirect(route('tes.tests.index'));
    }
}
