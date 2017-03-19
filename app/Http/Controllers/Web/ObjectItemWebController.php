<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ObjectItemRequest;
use App\Models\ObjectItem;
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
     * @param Request $request
     * @return View
     */
    public function search(Request $request)
    {
        $objectItems = $this->objectItemService->search($request->all());

        return view('search')
            ->with('objectItems', $objectItems);
    }

    /**
     * @return View
     */
    public function create()
    {
        $this->authorize('create', ObjectItem::class);

        $objectItem = $this->objectItemService->createObjectItem();
        $objectItemList = $this->objectItemService->findAll();

        return view('form')
            ->with('action', 'create')
            ->with('objectItem', $objectItem)
            ->with('objectItemList', $objectItemList);
    }

    /**
     * @param ObjectItemRequest|Request $request
     * @return View
     */
    public function store(ObjectItemRequest $request)
    {
        $this->authorize('create', ObjectItem::class);

        $objectItem = $this->objectItemService->create($request->all());
        $objectItem = $this->objectItemService->setChildren($objectItem->id, $request->all());

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
        $this->authorize('update', ObjectItem::class);

        $objectItem = $this->objectItemService->findOneById($id);
        $objectItemList = $this->objectItemService->findAll();

        return view('form')
            ->with('action', 'update')
            ->with('objectItem', $objectItem)
            ->with('objectItemList', $objectItemList);
    }

    /**
     * @param int $id
     * @param ObjectItemRequest|Request $request
     * @return View
     */
    public function update($id, ObjectItemRequest $request)
    {
        $this->authorize('update', ObjectItem::class);

        $objectItem = $this->objectItemService->update($id, $request->all());
        $objectItem = $this->objectItemService->setChildren($objectItem->id, $request->all());

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
