from time import sleep
import asyncio

async def goToStore():
    print('洗剤を買いに行く')
    await asyncio.sleep(3)

async def doTheLaundry():
    print('洗濯機を回す')
    await asyncio.sleep(1)

async def hangTheLaundry():
    print('洗濯ものを干す')
    await asyncio.sleep(2)
    

if __name__ == "__main__":
    '''
    処理は上からしたに流れる
    '''
    loop = asyncio.get_event_loop()
    asyncio.ensure_future(goToStore())
    asyncio.ensure_future(doTheLaundry())
    asyncio.ensure_future(hangTheLaundry())
    loop.run_forever()
