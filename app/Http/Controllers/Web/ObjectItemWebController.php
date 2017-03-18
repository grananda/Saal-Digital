<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ObjectItemRequest;
use App\Services\Contract\ObjectItemServiceInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ObjectItemWebController extends Controller
{
    /** @var  ObjectItemServiceInterface */
    protected $objectItemService;

    public function __construct(
        ObjectItemServiceInterface $objectItemService
    )
    {
        $this->objectItemService = $objectItemService;
    }

    /**
     * @return View
     */
    public function index()
    {
        $objectItems = $this->objectItemService->findAll();

        return view('index')
            ->with('objectItems', $objectItems);
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('form');
    }

    /**
     * @param ObjectItemRequest|Request $request
     * @return View
     */
    public function store(ObjectItemRequest $request)
    {
        $objectItem = $this->objectItemService->create($request->all());

        return view('show')
            ->with('objectItem', $objectItem);
    }

    /**
     * @param  int $id
     * @return View
     */
    public function show($id)
    {
        $objectItem = $this->objectItemService->findOneById($id);

        return view('show')
            ->with('objectItem', $objectItem);
    }

    /**
     * @param  int $id
     * @return View
     */
    public function edit($id)
    {
        $objectItem = $this->objectItemService->findOneById($id);

        return view('form')
            ->with('objectItem', $objectItem);
    }

    /**
     * @param int $id
     * @param ObjectItemRequest|Request $request
     * @return View
     */
    public function update($id, ObjectItemRequest $request)
    {
        $objectItem = $this->objectItemService->update($id, $request->all());

        return view('show')
            ->with('objectItem', $objectItem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return View
     */
    public function destroy($id)
    {
        $this->objectItemService->delete($id);

        $objectItems = $this->objectItemService->findAll();

        return view('index')
            ->with('objectItems', $objectItems);
    }

    /**
     * @param $parent
     * @param $child
     * @return View
     */
    public function attachObjectItem($parent, $child)
    {
        $objectItem = $this->objectItemService->attachObjectItem($parent, $child);

        return view('show')
            ->with('objectItem', $objectItem);
    }

    /**
     * @param $parent
     * @param $child
     * @return View
     */
    public function detachObjectItem($parent, $child)
    {
        $objectItem = $this->objectItemService->detachObjectItem($parent, $child);

        return view('show')
            ->with('objectItem', $objectItem);
    }
}
